<?php 
/* SVN FILE: $Id$ */
/* Department Fixture generated on: 2009-03-01 11:03:54 : 1235906994*/

class DepartmentFixture extends CakeTestFixture {
	var $name = 'Department';
	var $table = 'departments';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
}
?>