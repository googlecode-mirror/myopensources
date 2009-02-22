<?php 
/* SVN FILE: $Id$ */
/* FinanceCategoriesController Test cases generated on: 2009-02-21 17:02:27 : 1235208987*/
App::import('Controller', 'Finance.FinanceCategories');

class TestFinanceCategories extends FinanceCategoriesController {
	var $autoRender = false;
}

class FinanceCategoriesControllerTest extends CakeTestCase {
	var $FinanceCategories = null;

	function setUp() {
		$this->FinanceCategories = new TestFinanceCategories();
		$this->FinanceCategories->constructClasses();
	}

	function testFinanceCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->FinanceCategories, 'FinanceCategoriesController'));
	}

	function tearDown() {
		unset($this->FinanceCategories);
	}
}
?>