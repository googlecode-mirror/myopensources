<?php 
/* SVN FILE: $Id$ */
/* FinanceCategory Fixture generated on: 2009-02-21 17:02:52 : 1235209072*/

class FinanceCategoryFixture extends CakeTestFixture {
	var $name = 'FinanceCategory';
	var $table = 'finance_categories';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'category_name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 60),
			'active' => array('type'=>'string', 'null' => false, 'default' => 'new', 'length' => 8),
			'add_ip' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 24),
			'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'category_name'  => 'Lorem ipsum dolor sit amet',
			'active'  => 'Lorem ',
			'add_ip'  => 'Lorem ipsum dolor sit ',
			'created'  => '2009-02-21 17:37:52',
			'modified'  => 1
			));
}
?>