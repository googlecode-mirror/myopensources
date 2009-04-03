<?php 
/* SVN FILE: $Id$ */
/* MailCustomer Test cases generated on: 2009-04-03 15:04:05 : 1238744945*/
App::import('Model', 'Webmailler.MailCustomer');

class MailCustomerTestCase extends CakeTestCase {
	var $MailCustomer = null;
	var $fixtures = array('plugin.webmailler.mail_customer');

	function startTest() {
		$this->MailCustomer =& ClassRegistry::init('MailCustomer');
	}

	function testMailCustomerInstance() {
		$this->assertTrue(is_a($this->MailCustomer, 'MailCustomer'));
	}

	function testMailCustomerFind() {
		$this->MailCustomer->recursive = -1;
		$results = $this->MailCustomer->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('MailCustomer' => array(
			'id'  => 1,
			'nickname'  => 'Lorem ipsum dolor sit amet',
			'gender'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'tel'  => 'Lorem ipsum dolor sit amet',
			'memo'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>