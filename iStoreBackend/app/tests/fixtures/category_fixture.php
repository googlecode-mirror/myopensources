<?php
/* Category Fixture generated on: 2011-06-14 17:01:33 : 1308042093 */
class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '????', 'charset' => 'utf8'),
		'pid' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'comment' => '?????1 ???? 2 ???'),
		'created' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '????'),
		'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '??????'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'pid' => 1,
			'created' => 1,
			'modified' => 1
		),
	);
}
?>