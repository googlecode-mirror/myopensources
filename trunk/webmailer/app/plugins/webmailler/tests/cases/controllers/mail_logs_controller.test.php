<?php 
/* SVN FILE: $Id$ */
/* MailLogsController Test cases generated on: 2010-02-20 14:02:13 : 1266676933*/
App::import('Controller', 'Webmailler.MailLogs');

class TestMailLogs extends MailLogsController {
	var $autoRender = false;
}

class MailLogsControllerTest extends CakeTestCase {
	var $MailLogs = null;

	function setUp() {
		$this->MailLogs = new TestMailLogs();
		$this->MailLogs->constructClasses();
	}

	function testMailLogsControllerInstance() {
		$this->assertTrue(is_a($this->MailLogs, 'MailLogsController'));
	}

	function tearDown() {
		unset($this->MailLogs);
	}
}
?>