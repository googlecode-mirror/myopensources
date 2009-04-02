<?php
class MailServersController extends WebmaillerAppController {

	var $name = 'MailServers';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->MailServer->recursive = 0;
		$this->set('mailServers', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("Finance", true), 'url'=>'/admin/finance/financies' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/webmailler/mail_servers/add', 'class'=>'act-new', 'attr' =>array('class'=>'ex4Trigger', 'title'=>__("New Server", true) ) ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				array('text'=> __("Export", true), 'url'=>'/admin/webmailler/mail_servers/export', 'class'=>'act-new', 'attr' =>array('title'=>__("Export Servers", true) ) ),
				array('text'=> __("Import", true), 'url'=>'/admin/webmailler/mail_servers/import', 'class'=>'act-new', 'attr' =>array('title'=>__("Import Servers", true) ) ),
				
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

}
?>