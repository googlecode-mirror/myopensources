<?php
/**
 *
 * Email template and send mail controller
 * 
 * @package    Core
 * @subpackage Core
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-4-4
 * @version 1.0.0 $id$
 */
 
class MailTemplatesController extends WebmaillerAppController {

	var $name = 'MailTemplates';
	var $helpers = array('Html', 'Form', 'Tinymce');
	var $components = array( 
		'Upload'=>array(
			'encrypt_name' 	=> false,
			'operate' 		=> 'none',//[none, resize, crop, rotate, watermark]	
			'upload_type' 	=> 'attachment',
	) 
	); 
	var $attachments_splitor = '\001';
	var $group_splitor = ',';
	
	
	function admin_index() {
		$this->MailTemplate->recursive = 0;
		$this->set('mailTemplates', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("Templates", true), 'url'=>'/admin/webmailler/mail_templates' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/webmailler/mail_templates/add', 'class'=>'act-new' ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				
			)
		);
		
	}

	function admin_view($id = null) {
		$this->layout = 'ajax';
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid MailTemplate.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('mailTemplate', $this->MailTemplate->read(null, $id));
	}

	function admin_add() {
//		$this->layout = 'ajax';
		
		if (!empty($this->data)) {
			if (is_array($this->data['MailTemplate']['to'])) {
				$this->data['MailTemplate']['to'] = implode($this->group_splitor, $this->data['MailTemplate']['to']);
			}
			
			// do validate
			$this->MailTemplate->set($this->data);
			if ( $this->MailTemplate->validates() ) {
				
				if ( isset($this->data['MailTemplate']['attachments']) && is_array($this->data['MailTemplate']['attachments']) ) {
					$attachemts = array();
					foreach ($this->data['MailTemplate']['attachments'] as $key=>$data){
						if ($data && isset($this->data['MailTemplate']['attachments'][$key]['size']) && ($this->data['MailTemplate']['attachments'][$key] > 0) ) {
							$attachemts[] = $this->Upload->upload(array('attachments', $key), 'MailTemplate');
						}
						
					}
					
					if ( count($attachemts) > 0 ) {
						$this->data['MailTemplate']['attachments'] = implode($this->attachments_splitor, $attachemts);
					}
				}
				
				$this->MailTemplate->create();
				if ($this->MailTemplate->save($this->data)) {
					$this->Session->setFlash(__('The MailTemplate has been saved', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('The MailTemplate could not be saved. Please, try again.', true));
				}
				
			}
			
		}
		
		//--- get customer groups
		App::import('Model', 'Webmailler.MailCustomerCategory');
		$MailCustomerCategory = new MailCustomerCategory();
		$mailCustomerCategories = $MailCustomerCategory->find('list');
		$this->set(compact('mailCustomerCategories'));
	}

	function admin_edit($id = null) {
//		$this->layout = 'ajax';
		$attachments = array();
		$uncheck_groups = $checked_groups = array();
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid MailTemplate', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			// do validate
			if (is_array($this->data['MailTemplate']['to'])) {
				$this->data['MailTemplate']['to'] = implode($this->group_splitor, $this->data['MailTemplate']['to']);
			} 
			
			$this->MailTemplate->set($this->data);
			if ( $this->MailTemplate->validates() ) {
				
				$attachemts = array();
				if ( isset($this->data['MailTemplate']['attachments']) && is_array($this->data['MailTemplate']['attachments']) ) {
					foreach ($this->data['MailTemplate']['attachments'] as $key=>$data){
						if ($data && isset($this->data['MailTemplate']['attachments'][$key]['size']) && ($this->data['MailTemplate']['attachments'][$key] > 0) ) {
							$attachemts[] = $this->Upload->upload(array('attachments', $key), 'MailTemplate');
						}
						
					}
					
				}
				if (isset($this->data['MailTemplate']['old_attachments']) && is_array($this->data['MailTemplate']['old_attachments']) ) {
					$attachemts = array_merge($attachemts, $this->data['MailTemplate']['old_attachments']);
				}
				if ( count($attachemts) > 0 ) {
					$this->data['MailTemplate']['attachments'] = implode($this->attachments_splitor, $attachemts);
				}
				
				if ($this->MailTemplate->save($this->data)) {
					$this->Session->setFlash(__('The MailTemplate has been saved', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('The MailTemplate could not be saved. Please, try again.', true));
				}
				
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MailTemplate->read(null, $id);
			if ($this->data['MailTemplate']['attachments']) {
				$attachments = explode($this->attachments_splitor, $this->data['MailTemplate']['attachments']);
			}
			
		}
		//--- get customer groups
		App::import('Model', 'Webmailler.MailCustomerCategory');
		$MailCustomerCategory = new MailCustomerCategory();
		$mailCustomerCategories = $MailCustomerCategory->find('list');
		if (empty($this->data['MailTemplate']['to'])) {
			$uncheck_groups = $mailCustomerCategories;
		}else {
			$groups = explode($this->group_splitor, $this->data['MailTemplate']['to']);
			foreach ($mailCustomerCategories as $key=>$value) {
				if (in_array($key, $groups)) {
					$checked_groups[$key] = $value;
				}else {
					$uncheck_groups[$key] = $value;
				}
			}
			
		}
		
		$this->set('uncheck_groups', $uncheck_groups );
		$this->set('checked_groups', $checked_groups);
			
		$this->set('attachments', $attachments);
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
	
	/**
	 * Send email to all customers according provided template id
	 *
	 * @access	public
	 * @author	John.Meng(孟远螓) arzen1013@gmail.com 2009-4-4
	 * @param	int	$id 
	 * @return	void
	 */
	function admin_send($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for MailTemplate', true));
			$this->redirect(array('action'=>'index'));
		}
		$mail_msg = $this->MailTemplate->sendMail($id);
		$this->set("mail_msg", $mail_msg);
	}
		
}
?>