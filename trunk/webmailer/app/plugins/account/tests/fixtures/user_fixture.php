<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2009-03-01 12:03:16 : 1235909056*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'username' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'password' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'gender' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 1),
			'realname' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 30),
			'birthday' => array('type'=>'date', 'null' => false, 'default' => NULL),
			'marriage' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 1),
			'addrees' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 150),
			'phone' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 80),
			'mobile' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 80),
			'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 120),
			'photo' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
			'memo' => array('type'=>'text', 'null' => false, 'default' => NULL),
			'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'add_ip' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'created' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'gender'  => 'Lorem ipsum dolor sit ame',
			'realname'  => 'Lorem ipsum dolor sit amet',
			'birthday'  => '2009-03-01',
			'marriage'  => 'Lorem ipsum dolor sit ame',
			'addrees'  => 'Lorem ipsum dolor sit amet',
			'phone'  => 'Lorem ipsum dolor sit amet',
			'mobile'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'photo'  => 'Lorem ipsum dolor sit amet',
			'memo'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'user_id'  => 1,
			'add_ip'  => 1,
			'created'  => 1,
			'modified'  => 1
			));
}
?>