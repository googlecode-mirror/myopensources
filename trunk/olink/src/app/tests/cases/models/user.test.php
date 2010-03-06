<?php
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2010-01-26 05:01:53 : 1264485173*/
App::import('Model', 'User');

class TestUser extends User {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class UserTestCase extends CakeTestCase {
	var $User = null;

	function start() {
		parent::start();
		$this->User = new TestUser();
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testAddUser() {
		$data = array(
			"username"=>"test",
			"user_type"=>0,
			"login_type"=>0,
			"password"=>"test1234",

		);
		$this->User->save($data);
	}

//	function testUserFind() {
//		$this->User->recursive = -1;
//		$results = $this->User->find('first');
//		$this->assertTrue(!empty($results));
//
//		$expected = array('User' => array(
//			'id'  => 1,
//			'name'  => 'Lorem ipsum dolor sit amet',
//			'logo'  => 'Lorem ipsum dolor sit amet',
//			'activity_type'  => 1,
//			'content'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,
//									phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,
//									vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,
//									feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.
//									Orci aliquet, in lorem et velit maecenas luctus, wisi nulla at, mauris nam ut a, lorem et et elit eu.
//									Sed dui facilisi, adipiscing mollis lacus congue integer, faucibus consectetuer eros amet sit sit,
//									magna dolor posuere. Placeat et, ac occaecat rutrum ante ut fusce. Sit velit sit porttitor non enim purus,
//									id semper consectetuer justo enim, nulla etiam quis justo condimentum vel, malesuada ligula arcu. Nisl neque,
//									ligula cras suscipit nunc eget, et tellus in varius urna odio est. Fuga urna dis metus euismod laoreet orci,
//									litora luctus suspendisse sed id luctus ut. Pede volutpat quam vitae, ut ornare wisi. Velit dis tincidunt,
//									pede vel eleifend nec curabitur dui pellentesque, volutpat taciti aliquet vivamus viverra, eget tellus ut
//									feugiat lacinia mauris sed, lacinia et felis.',
//			'photo'  => 'Lorem ipsum dolor sit amet',
//			'url'  => 'Lorem ipsum dolor sit amet',
//			'active'  => 1,
//			'created'  => 1,
//			'user_id'  => 1
//			));
//		$this->assertEqual($results, $expected);
//	}


}
?>