<?php 
/* SVN FILE: $Id$ */
/* StockCategory Fixture generated on: 2009-06-22 16:06:40 : 1245660220*/

class StockCategoryFixture extends CakeTestFixture {
	var $name = 'StockCategory';
	var $table = 'stock_categories';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'code' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
			'description' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 80),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'code'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
}
?>