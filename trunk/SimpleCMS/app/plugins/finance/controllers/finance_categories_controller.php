<?php
class FinanceCategoriesController extends FinanceAppController {

	var $name = 'FinanceCategories';
	var $helpers = array('Html', 'Form', 'Modal');

	function admin_index() {
		$this->FinanceCategory->recursive = 0;
		$this->set('financeCategories', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("FinanceCategory", true), 'url'=>'/admin/finance/finance_categories' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/finance/finance_categories/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Finance Category", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				//array('text'=> __("Search", true), 'url'=>'/admin/article_categories/add', 'class'=>'act-find' ),
				
			)
		);
		
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FinanceCategory.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financeCategory', $this->FinanceCategory->read(null, $id));
		
	}

	function admin_add() {
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->FinanceCategory->create();
			if ($this->FinanceCategory->save($this->data)) {
				$this->Session->setFlash(__('The FinanceCategory has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceCategory could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FinanceCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FinanceCategory->save($this->data)) {
				$this->Session->setFlash(__('The FinanceCategory has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FinanceCategory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FinanceCategory->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FinanceCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FinanceCategory->del($id)) {
			$this->Session->setFlash(__('FinanceCategory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_delSelected() {
		if ( $this->FinanceCategory->delIds($this->params['form']['all']) ) {
			$this->Session->setFlash(__('Deleted select records', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	
}
?>