<?php 
/* SVN FILE: $Id$ */
/* Department Test cases generated on: 2009-03-01 11:03:54 : 1235906994*/
App::import('Model', 'Account.Department');

class DepartmentTestCase extends CakeTestCase {
	var $Department = null;
	var $fixtures = array('plugin.account.department');

	function startTest() {
		$this->Department =& ClassRegistry::init('Department');
	}

	function testDepartmentInstance() {
		$this->assertTrue(is_a($this->Department, 'Department'));
	}

	function testDepartmentFind() {
		$this->Department->recursive = -1;
		$results = $this->Department->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Department' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>