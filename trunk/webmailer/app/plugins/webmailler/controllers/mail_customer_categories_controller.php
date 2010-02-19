<?php
class MailCustomerCategoriesController extends WebmaillerAppController {

	var $name = 'MailCustomerCategories';
	var $helpers = array('Html', 'Form');


	function admin_index() {
		$this->MailCustomerCategory->recursive = 0;
		$this->set('mailCustomerCategories', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("MailServer", true), 'url'=>'/admin/webmailler/mail_customer_categories' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/webmailler/mail_customer_categories/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Server", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				
			)
		);
		
		
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid MailCustomerCategory.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('mailCustomerCategory', $this->MailCustomerCategory->read(null, $id));
	}

	function admin_add() {
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->MailCustomerCategory->create();
			if ($this->MailCustomerCategory->save($this->data)) {
				$this->Session->setFlash(__('The MailCustomerCategory has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailCustomerCategory could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		$this->layout = 'ajax';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid MailCustomerCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->MailCustomerCategory->save($this->data)) {
				$this->Session->setFlash(__('The MailCustomerCategory has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailCustomerCategory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MailCustomerCategory->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for MailCustomerCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MailCustomerCategory->del($id, true)) {
			$this->Session->setFlash(__('MailCustomerCategory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>