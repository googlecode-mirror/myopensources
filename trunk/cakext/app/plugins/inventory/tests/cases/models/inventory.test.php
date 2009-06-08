<?php 
/* SVN FILE: $Id$ */
/* Inventory Test cases generated on: 2009-06-08 16:06:11 : 1244449751*/
App::import('Model', 'Inventory.Inventory');

class InventoryTestCase extends CakeTestCase {
	var $Inventory = null;
	var $fixtures = array('plugin.inventory.inventory');

	function startTest() {
		$this->Inventory =& ClassRegistry::init('Inventory');
	}

	function testInventoryInstance() {
		$this->assertTrue(is_a($this->Inventory, 'Inventory'));
	}

	function testInventoryFind() {
		$this->Inventory->recursive = -1;
		$results = $this->Inventory->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Inventory' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'address'  => 'Lorem ipsum dolor sit amet',
			'phone'  => 'Lorem ipsum dolor sit amet',
			'guard'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>