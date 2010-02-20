<?php
class MailLog extends WebmaillerAppModel {

	var $name = 'MailLog';
	
	/**
	 * Write message into table
	 * 
	 * @author John Meng
	 * @time 2010-2-20 下午10:28:38
	 * @param string $msg
	 * @return void
	 */
	function log($msg) {
		$data = array("MailLog"=>array(
			'msg' => $msg,
		));
		$this->save($data);
	}
}
?>