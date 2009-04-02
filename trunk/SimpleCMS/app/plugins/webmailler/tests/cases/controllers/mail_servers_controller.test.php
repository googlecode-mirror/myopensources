<?php 
/* SVN FILE: $Id$ */
/* MailServersController Test cases generated on: 2009-04-02 12:04:25 : 1238675305*/
App::import('Controller', 'Webmailler.MailServers');

class TestMailServers extends MailServersController {
	var $autoRender = false;
}

class MailServersControllerTest extends CakeTestCase {
	var $MailServers = null;

	function setUp() {
		$this->MailServers = new TestMailServers();
		$this->MailServers->constructClasses();
	}

	function testMailServersControllerInstance() {
		$this->assertTrue(is_a($this->MailServers, 'MailServersController'));
	}

	function tearDown() {
		unset($this->MailServers);
	}
}
?>