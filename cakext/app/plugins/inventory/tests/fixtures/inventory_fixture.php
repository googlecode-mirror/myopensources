<?php 
/* SVN FILE: $Id$ */
/* Inventory Fixture generated on: 2009-06-08 16:06:11 : 1244449751*/

class InventoryFixture extends CakeTestFixture {
	var $name = 'Inventory';
	var $table = 'inventories';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 120),
			'address' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 220),
			'phone' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 120),
			'guard' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'address'  => 'Lorem ipsum dolor sit amet',
			'phone'  => 'Lorem ipsum dolor sit amet',
			'guard'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
}
?>