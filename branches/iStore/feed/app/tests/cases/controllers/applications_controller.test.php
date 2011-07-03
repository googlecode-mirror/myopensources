<?php
/* Applications Test cases generated on: 2011-04-07 16:12:24 : 1302163944*/
App::import('Controller', 'Applications');

class TestApplicationsController extends ApplicationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ApplicationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.application');

	function startTest() {
		$this->Applications =& new TestApplicationsController();
		$this->Applications->constructClasses();
	}

	function endTest() {
		unset($this->Applications);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>