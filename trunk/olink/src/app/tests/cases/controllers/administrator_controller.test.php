<?php 
/* SVN FILE: $Id$ */
/* AdministratorController Test cases generated on: 2010-03-05 04:55:44 : 1267764944*/
App::import('Controller', 'Administrator');

class TestAdministrator extends AdministratorController {
	var $autoRender = false;
}

class AdministratorControllerTest extends CakeTestCase {
	var $Administrator = null;

	function startTest() {
		$this->Administrator = new TestAdministrator();
		$this->Administrator->constructClasses();
	}

	function testAdministratorControllerInstance() {
		$this->assertTrue(is_a($this->Administrator, 'AdministratorController'));
	}

	function endTest() {
		unset($this->Administrator);
	}
}
?>