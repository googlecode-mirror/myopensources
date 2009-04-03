<?php
class MailServersController extends WebmaillerAppController {

	var $name = 'MailServers';
	var $helpers = array('Html', 'Form');
	var $components = array( 
		'Upload'=>array(
			'encrypt_name' 	=> TRUE,
			'operate' 		=> 'none',//[none, resize, crop, rotate, watermark]	
			'upload_type' 	=> 'mailler',
	) 
	); 
	
	function admin_index() {
		$this->MailServer->recursive = 0;
		$this->set('mailServers', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("MailServer", true), 'url'=>'/admin/webmailler/mail_servers' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/webmailler/mail_servers/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Server", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				array('text'=> __("Export", true), 'url'=>'/admin/webmailler/mail_servers/export', 'class'=>'act-new', 'attr' =>array('title'=>__("Export Servers", true) ) ),
				array('text'=> __("Import", true), 'url'=>'/admin/webmailler/mail_servers/import', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("Import Servers", true) ) ),
				
			)
		);
		
	}

	function admin_add() {
		$this->layout = 'ajax';
		if (!empty($this->data)) {
			$this->MailServer->create();
			if ($this->MailServer->save($this->data)) {
				$this->Session->setFlash(__('The MailServer has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailServer could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		$this->layout = 'ajax';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid MailServer', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->MailServer->save($this->data)) {
				$this->Session->setFlash(__('The MailServer has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailServer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MailServer->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for MailServer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MailServer->del($id)) {
			$this->Session->setFlash(__('MailServer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function admin_export() {
		$this->MailServer->recursive = 0;
		$raw_data = $this->paginate();
		
		App::import("Vendor", "PHPExcel_Handler", array('file' => 'PHPExcel'.DS.'Handler.php') );
		$excelHandler = new PHPExcel_Handler("writer", "excel5");
		
		$objActSheet = $excelHandler->getExcel()->getActiveSheet();  
		  
		//设置当前活动sheet的名称  
		$objActSheet->setTitle(date("Y-m-d"));  
		  
		//-- set contents   
		$data = array();
		$title_data = array(
			__("Host", true), 
			__("Ssl", true), 
			__("Port", true), 
			__("Account", true), 
			__("Passwd", true), 
			
		);
		array_push($data, $title_data);
		foreach ($raw_data as $row){
			$item = array(
				$row['MailServer']['host'],
				$row['MailServer']['ssl'],
				$row['MailServer']['port'],
				$row['MailServer']['account'],
				$row['MailServer']['passwd'],
				
			);
			array_push($data, $item);
		}
		$objActSheet->fromArray($data);
		
		$outputFileName = "mail_servers_list.xls";  
		$excelHandler->saveOutput($outputFileName);  
	}
	
	function admin_import() {
		$this->layout = 'ajax';
		
	}
	
	function admin_import_data() {
		$this->layout = 'ajax';
		if (!empty($this->data)) {
			// do validate
			$this->MailServer->set($this->data);
			if ( $this->MailServer->validates() ) {
				
				if (isset($this->data['MailServer']['file']['size']) && ($this->data['MailServer']['file']['size'] > 0) ) {
					$importFileName = $this->Upload->upload('file', 'MailServer');
					App::import("Vendor", "PHPExcel_Handler", array('file' => 'PHPExcel'.DS.'Handler.php') );
					$excelHandler = new PHPExcel_Handler("reader", "excel5");
					$excelReader = $excelHandler->getProcesser();
					$excelObj = $excelReader->load($importFileName);
					$data = $excelObj->getActiveSheet()->toArray();
					if (is_array($data) && (count($data) > 1) ) {
						array_shift($data);
						foreach ($data as $key => $item) {
							$tmp = array('MailServer'=>array(
								'host'=>$item[0],
								'ssl'=>$item[1],
								'port'=>$item[2],
								'account'=>$item[3],
								'passwd'=>$item[4],
							
							));
							unset($data[$key]);
							$data[$key] = $tmp;
						}
						$this->MailServer->saveAll($data);
						
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