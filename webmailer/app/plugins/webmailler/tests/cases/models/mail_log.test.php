<?php 
/* SVN FILE: $Id$ */
/* MailLog Test cases generated on: 2009-04-05 04:04:54 : 1238907174*/
App::import('Model', 'Webmailler.MailLog');

class MailLogTestCase extends CakeTestCase {
	var $MailLog = null;

	function startTest() {
		$this->MailLog =& ClassRegistry::init('MailLog');
	}

	function testMailLogInstance() {
		$this->assertTrue(is_a($this->MailLog, 'MailLog'));
	}

	function testAddMailLog() {
		$msg = "send success 200s;";
		$this->MailLog->log($msg);
	}
}
?>