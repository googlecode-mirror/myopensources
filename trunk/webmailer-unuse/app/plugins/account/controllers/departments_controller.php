<?php
class DepartmentsController extends AccountAppController {

	var $name = 'Departments';
	var $helpers = array('Html', 'Form', 'Modal');

	function admin_index() {
		$this->Department->recursive = 0;
		$this->set('departments', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("Department", true), 'url'=>'/admin/account/departments' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/account/departments/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Department", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				
			)
		);
		
	}

	function admin_add() {
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->Department->create();
			if ($this->Department->save($this->data)) {
				$this->Session->setFlash(__('The Department has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Department could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		$this->layout = 'ajax';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Department', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Department->save($this->data)) {
				$this->Session->setFlash(__('The Department has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Department could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Department->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Department', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Department->del($id)) {
			$this->Session->setFlash(__('Department deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>