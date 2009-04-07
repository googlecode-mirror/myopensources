<?php 
/* SVN FILE: $Id$ */
/* DepartmentsController Test cases generated on: 2009-03-01 11:03:21 : 1235907081*/
App::import('Controller', 'Account.Departments');

class TestDepartments extends DepartmentsController {
	var $autoRender = false;
}

class DepartmentsControllerTest extends CakeTestCase {
	var $Departments = null;

	function setUp() {
		$this->Departments = new TestDepartments();
		$this->Departments->constructClasses();
	}

	function testDepartmentsControllerInstance() {
		$this->assertTrue(is_a($this->Departments, 'DepartmentsController'));
	}

	function tearDown() {
		unset($this->Departments);
	}
}
?>