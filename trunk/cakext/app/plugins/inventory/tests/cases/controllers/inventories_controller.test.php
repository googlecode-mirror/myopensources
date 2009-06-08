<?php 
/* SVN FILE: $Id$ */
/* InventoriesController Test cases generated on: 2009-06-08 16:06:42 : 1244449842*/
App::import('Controller', 'Inventory.Inventories');

class TestInventories extends InventoriesController {
	var $autoRender = false;
}

class InventoriesControllerTest extends CakeTestCase {
	var $Inventories = null;

	function setUp() {
		$this->Inventories = new TestInventories();
		$this->Inventories->constructClasses();
	}

	function testInventoriesControllerInstance() {
		$this->assertTrue(is_a($this->Inventories, 'InventoriesController'));
	}

	function tearDown() {
		unset($this->Inventories);
	}
}
?>