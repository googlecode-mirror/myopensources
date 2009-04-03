<?php 
/* SVN FILE: $Id$ */
/* MailCustomersController Test cases generated on: 2009-04-03 15:04:14 : 1238745074*/
App::import('Controller', 'Webmailler.MailCustomers');

class TestMailCustomers extends MailCustomersController {
	var $autoRender = false;
}

class MailCustomersControllerTest extends CakeTestCase {
	var $MailCustomers = null;

	function setUp() {
		$this->MailCustomers = new TestMailCustomers();
		$this->MailCustomers->constructClasses();
	}

	function testMailCustomersControllerInstance() {
		$this->assertTrue(is_a($this->MailCustomers, 'MailCustomersController'));
	}

	function tearDown() {
		unset($this->MailCustomers);
	}
}
?>