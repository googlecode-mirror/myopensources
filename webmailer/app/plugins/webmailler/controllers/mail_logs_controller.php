<?php
class MailLogsController extends WebmaillerAppController {

	var $name = 'MailLogs';
	
	function admin_index() {
		$this->paginate = array(
			'limit' 	=> 20,
			'order' => array(
			    'MailLog.id' => 'desc'
			)
		);
		
		$this->set('mailLogs', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=>__("Mail log", true) ),
				
			),
		);
		
	}
}
?>