<?php 
/* SVN FILE: $Id$ */
/* MailServer Test cases generated on: 2009-04-02 12:04:27 : 1238675067*/
App::import('Model', 'Webmailler.MailServer');

class MailServerTestCase extends CakeTestCase {
	var $MailServer = null;
	var $fixtures = array('plugin.webmailler.mail_server');

	function startTest() {
		$this->MailServer =& ClassRegistry::init('MailServer');
	}

	function testMailServerInstance() {
		$this->assertTrue(is_a($this->MailServer, 'MailServer'));
	}

	function testMailServerFind() {
		$this->MailServer->recursive = -1;
		$results = $this->MailServer->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('MailServer' => array(
			'id'  => 1,
			'host'  => 'Lorem ipsum dolor sit amet',
			'ssl'  => 1,
			'port'  => 'Lo',
			'account'  => 'Lorem ipsum dolor sit amet',
			'passwd'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>