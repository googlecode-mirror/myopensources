<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2009-03-01 12:03:17 : 1235909057*/
App::import('Model', 'Account.User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('plugin.account.user');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>