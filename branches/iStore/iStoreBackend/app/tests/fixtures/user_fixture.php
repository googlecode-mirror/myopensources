<?php
/* User Fixture generated on: 2011-03-22 09:44:55 : 1300787095 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '???', 'charset' => 'utf8'),
		'passwd' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '??', 'charset' => 'utf8'),
		'addip' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 24, 'collate' => 'utf8_general_ci', 'comment' => '???IP', 'charset' => 'utf8'),
		'created' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '????'),
		'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '????'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'passwd' => 'Lorem ipsum dolor sit amet',
			'addip' => 'Lorem ipsum dolor sit ',
			'created' => 1,
			'modified' => 1
		),
	);
}
?>