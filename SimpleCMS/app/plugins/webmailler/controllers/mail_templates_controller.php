<?php
class MailTemplatesController extends WebmaillerAppController {

	var $name = 'MailTemplates';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->MailTemplate->recursive = 0;
		$this->set('mailTemplates', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("Templates", true), 'url'=>'/admin/webmailler/mail_templates' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/webmailler/mail_templates/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Template", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				
			)
		);
		
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid MailTemplate.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('mailTemplate', $this->MailTemplate->read(null, $id));
	}

	function admin_add() {
		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			$this->MailTemplate->create();
			if ($this->MailTemplate->save($this->data)) {
				$this->Session->setFlash(__('The MailTemplate has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailTemplate could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		$this->layout = 'ajax';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid MailTemplate', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->MailTemplate->save($this->data)) {
				$this->Session->setFlash(__('The MailTemplate has been saved', true));
				echo "done";
				exit;
//				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The MailTemplate could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MailTemplate->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for MailTemplate', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MailTemplate->del($id)) {
			$this->Session->setFlash(__('MailTemplate deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>