<?php
class FinanciesController extends FinanceAppController {

	var $name = 'Financies';
	var $helpers = array('Html', 'Form', 'Modal');

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
				
			)
		);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Financy.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('financy', $this->Financy->read(null, $id));
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
		$financeCategories = $this->Financy->FinanceCategory->find('list', array('fields'=>array('FinanceCategory.id', 'FinanceCategory.category_name')) );
		$this->set(compact('financeCategories'));
	}

	function admin_edit($id = null) {
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
		$financeCategories = $this->Financy->FinanceCategory->find('list');
		$this->set(compact('financeCategories'));
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