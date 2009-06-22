<?php 
/* SVN FILE: $Id$ */
/* StockCategoriesController Test cases generated on: 2009-06-22 16:06:01 : 1245660241*/
App::import('Controller', 'Purchase.StockCategories');

class TestStockCategories extends StockCategoriesController {
	var $autoRender = false;
}

class StockCategoriesControllerTest extends CakeTestCase {
	var $StockCategories = null;

	function setUp() {
		$this->StockCategories = new TestStockCategories();
		$this->StockCategories->constructClasses();
	}

	function testStockCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->StockCategories, 'StockCategoriesController'));
	}

	function tearDown() {
		unset($this->StockCategories);
	}
}
?>