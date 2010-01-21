<?php 
/* SVN FILE: $Id$ */
/* MailCustomerCategoriesController Test cases generated on: 2009-04-05 04:04:28 : 1238907208*/
App::import('Controller', 'Webmailler.MailCustomerCategories');

class TestMailCustomerCategories extends MailCustomerCategoriesController {
	var $autoRender = false;
}

class MailCustomerCategoriesControllerTest extends CakeTestCase {
	var $MailCustomerCategories = null;

	function setUp() {
		$this->MailCustomerCategories = new TestMailCustomerCategories();
		$this->MailCustomerCategories->constructClasses();
	}

	function testMailCustomerCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->MailCustomerCategories, 'MailCustomerCategoriesController'));
	}

	function tearDown() {
		unset($this->MailCustomerCategories);
	}
}
?>