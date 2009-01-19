<?php 
/* SVN FILE: $Id$ */
/* DashboardController Test cases generated on: 2009-01-19 16:01:51 : 1232355471*/
App::import('Controller', 'Dashboard');

class TestDashboard extends DashboardController {
	var $autoRender = false;
}

class DashboardControllerTest extends CakeTestCase {
	var $Dashboard = null;

	function setUp() {
		$this->Dashboard = new TestDashboard();
		$this->Dashboard->constructClasses();
	}

	function testDashboardControllerInstance() {
		$this->assertTrue(is_a($this->Dashboard, 'DashboardController'));
	}

	function tearDown() {
		unset($this->Dashboard);
	}
}
?>