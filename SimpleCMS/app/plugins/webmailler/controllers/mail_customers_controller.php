<?php
class MailCustomersController extends WebmaillerAppController {

	var $name = 'MailCustomers';
	var $helpers = array('Html', 'Form');
	var $components = array( 
		'Upload'=>array(
			'encrypt_name' 	=> TRUE,
			'operate' 		=> 'none',//[none, resize, crop, rotate, watermark]	
			'upload_type' 	=> 'mailler',
	) 
	); 
	var $gender_options;
	
	function beforeRender() {
		parent::beforeRender();
		$this->gender_options = Configure::read('gender_options');
		$this->set("gender_options", $this->gender_options);
		
	}

	function admin_index() {
		$this->MailCustomer->recursive = 0;
		$this->set('mailCustomers', $this->paginate());
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("Customers", true), 'url'=>'/admin/webmailler/mail_customers' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/webmailler/mail_customers/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Customer", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				array('text'=> __("Export", true), 'url'=>'/admin/webmailler/mail_customers/export', 'class'=>'act-new', 'attr' =>array('title'=>__("Export Customers", true) ) ),
				array('text'=> __("Import", true), 'url'=>'/admin/webmailler/mail_customers/import', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("Import Customers", true) ) ),
				
			)
		);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid MailCustomer.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('mailCustomer', $this->MailCustomer->read(null, $id));
	}

	function admin_add() {
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->MailCustomer->create();
			if ($this->MailCustomer->save($this->data)) {
				$this->Session->setFlash(__('The MailCustomer has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailCustomer could not be saved. Please, try again.', true));
			}
		}
		$mailCustomerCategories = $this->MailCustomer->MailCustomerCategory->find('list');
		$this->set(compact('mailCustomerCategories'));
	}

	function admin_edit($id = null) {
		$this->layout = 'ajax';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid MailCustomer', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->MailCustomer->save($this->data)) {
				$this->Session->setFlash(__('The MailCustomer has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailCustomer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MailCustomer->read(null, $id);
		}
		$mailCustomerCategories = $this->MailCustomer->MailCustomerCategory->find('list');
		$this->set(compact('mailCustomerCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for MailCustomer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MailCustomer->del($id)) {
			$this->Session->setFlash(__('MailCustomer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function admin_export() {
		$this->MailCustomer->recursive = 0;
		$raw_data = $this->paginate();
		
		App::import("Vendor", "PHPExcel_Handler", array('file' => 'PHPExcel'.DS.'Handler.php') );
		$excelHandler = new PHPExcel_Handler("writer", "excel5");
		
		$objActSheet = $excelHandler->getExcel()->getActiveSheet();  
		  
		//-- set current sheet name --
		$objActSheet->setTitle(date("Y-m-d"));  
		  
		//-- set contents   
		$data = array();
		$title_data = array(
			__("Nickname", true), 
			__("Categories", true), 
			__("Gender", true), 
			__("Email", true), 
			__("Tel", true), 
			
		);
		array_push($data, $title_data);
		foreach ($raw_data as $row){
			$item = array(
				$row['MailCustomer']['nickname'],
				$row['MailCustomer']['mail_customer_category_id'],
				$row['MailCustomer']['gender'],
				$row['MailCustomer']['email'],
				$row['MailCustomer']['tel'],
				
			);
			array_push($data, $item);
		}
		$objActSheet->fromArray($data);
		
		$outputFileName = "mail_customers_list.xls";  
		$excelHandler->saveOutput($outputFileName);  
	}
	
	function admin_import() {
		$this->layout = 'ajax';
		$this->set("current_model", $this->modelClass );
		$this->set("current_controller", $this->params['controller'] );
		$this->set("msg", __("Import Customers", true) );
		$this->render("/mail_servers/admin_import");
	}
	
	function admin_import_data() {
		$this->layout = 'ajax';
		if (!empty($this->data)) {
			// do validate
			$this->MailCustomer->set($this->data);
			if ( $this->MailCustomer->validates() ) {
				
				if (isset($this->data['MailCustomer']['file']['size']) && ($this->data['MailCustomer']['file']['size'] > 0) ) {
					$importFileName = $this->Upload->upload('file', 'MailCustomer');
					App::import("Vendor", "PHPExcel_Handler", array('file' => 'PHPExcel'.DS.'Handler.php') );
					$excelHandler = new PHPExcel_Handler("reader", "excel5");
					$excelReader = $excelHandler->getProcesser();
					$excelObj = $excelReader->load($importFileName);
					$data = $excelObj->getActiveSheet()->toArray();
					if (is_array($data) && (count($data) > 1) ) {
						array_shift($data);
						foreach ($data as $key => $item) {
							$tmp = array('MailCustomer'=>array(
								'nickname'=>$item[0],
								'mail_customer_category_id'=>$item[1],
								'gender'=>$item[2],
								'email'=>$item[3],
								'tel'=>$item[4],
							
							));
							unset($data[$key]);
							$data[$key] = $tmp;
						}
						$this->MailCustomer->saveAll($data);
						
					}
					
					unlink($importFileName);
					echo "done";
					exit;
					
				} else {
					echo "done";
					exit;
				}
				
			}
			
		}
		
	}

}
?>