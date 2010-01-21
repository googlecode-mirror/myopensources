<?php 
/* SVN FILE: $Id$ */
/* MailTemplatesController Test cases generated on: 2009-04-03 15:04:40 : 1238745340*/
App::import('Controller', 'Webmailler.MailTemplates');

class TestMailTemplates extends MailTemplatesController {
	var $autoRender = false;
}

class MailTemplatesControllerTest extends CakeTestCase {
	var $MailTemplates = null;

	function setUp() {
		$this->MailTemplates = new TestMailTemplates();
		$this->MailTemplates->constructClasses();
	}

	function testMailTemplatesControllerInstance() {
		$this->assertTrue(is_a($this->MailTemplates, 'MailTemplatesController'));
	}

	function tearDown() {
		unset($this->MailTemplates);
	}
}
?>