<?php
class FinanciesController extends FinanceAppController {

	var $name = 'Financies';
	var $helpers = array('Html', 'Form', 'Number', 'Modal');
	var $debit_options = null;

	function beforeRender() {
		parent::beforeRender();
		$this->debit_options = Configure::read('debit_options');
		$this->set("debit_options", $this->debit_options);
		
		$financeCategories = $this->Financy->FinanceCategory->find('list', array('fields'=>array('FinanceCategory.id', 'FinanceCategory.category_name')) );
		$this->set(compact('financeCategories'));
		
	}
	
	function admin_index() {
		$this->Financy->recursive = 0;
		$this->set('financies', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("Finance", true), 'url'=>'/admin/finance/financies' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/finance/financies/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Finance", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				array('text'=> __("Export", true), 'url'=>'/admin/finance/financies/export', 'class'=>'act-new', 'attr' =>array('title'=>__("Export Finance", true) ) ),
				array('text'=> __("Import", true), 'url'=>'/admin/finance/financies/import', 'class'=>'act-new', 'attr' =>array('title'=>__("Import Finance", true) ) ),
				
			)
		);
		
	}

	function admin_view($id = null) {
		$this->layout = 'ajax';
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid Financy.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financy', $this->Financy->read(null, $id));
	}
	
	function admin_export() {
		$this->Financy->recursive = 0;
		$raw_data = $this->paginate();
		
		App::import("Vendor", "PHPExcel_Handler", array('file' => 'PHPExcel'.DS.'Handler.php') );
		$excelHandler = new PHPExcel_Handler("writer", "excel5");
		
		$objActSheet = $excelHandler->getExcel()->getActiveSheet();  
		  
		//设置当前活动sheet的名称  
		$objActSheet->setTitle(date("Y-m-d"));  
		  
		//-- set contents   
		$data = array();
		$title_data = array(
			__("Categories", true), 
			__("Create Date", true), 
			__("Debit", true), 
			__("Money", true), 
			__("Memo", true), 
			
		);
		array_push($data, $title_data);
		Configure::load("common");
		$debit_options = Configure::read('debit_options');
		foreach ($raw_data as $row){
			$item = array(
				$row['FinanceCategory']['category_name'],
				$row['Financy']['create_date'],
				$debit_options[ $row['Financy']['debit'] ],
				$row['Financy']['money'],
				$row['Financy']['memo'],
				
			);
			array_push($data, $item);
		}
		$objActSheet->fromArray($data);
		
		$outputFileName = "output.xls";  
		$excelHandler->saveOutput($outputFileName);  
	}
	
	function admin_import() {
		App::import("Vendor", "PHPExcel_Handler", array('file' => 'PHPExcel'.DS.'Handler.php') );
		$excelHandler = new PHPExcel_Handler("reader", "excel5");
		$excelReader = $excelHandler->getProcesser();
		$outputFileName = "d:/output.xls";
		$excelObj = $excelReader->load($outputFileName);
		debug($excelObj->getActiveSheet()->toArray() );
		$this->render("admin_export");
		
	}
	

	function admin_add() {
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->Financy->create();
			if ($this->Financy->save($this->data)) {
				$this->Session->setFlash(__('The Financy has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Financy could not be saved. Please, try again.', true));
			}
		}
		
	}

	function admin_edit($id = null) {
		$this->layout = 'ajax';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Financy', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Financy->save($this->data)) {
				$this->Session->setFlash(__('The Financy has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Financy could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Financy->read(null, $id);
		}
		
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Financy', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Financy->del($id)) {
			$this->Session->setFlash(__('Financy deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
}
?>