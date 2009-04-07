<?php 
/* SVN FILE: $Id$ */
/* MailCustomerCategory Test cases generated on: 2009-04-05 04:04:54 : 1238907174*/
App::import('Model', 'Webmailler.MailCustomerCategory');

class MailCustomerCategoryTestCase extends CakeTestCase {
	var $MailCustomerCategory = null;
	var $fixtures = array('plugin.webmailler.mail_customer_category');

	function startTest() {
		$this->MailCustomerCategory =& ClassRegistry::init('MailCustomerCategory');
	}

	function testMailCustomerCategoryInstance() {
		$this->assertTrue(is_a($this->MailCustomerCategory, 'MailCustomerCategory'));
	}

	function testMailCustomerCategoryFind() {
		$this->MailCustomerCategory->recursive = -1;
		$results = $this->MailCustomerCategory->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('MailCustomerCategory' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'active'  => 'Lorem ',
			'add_ip'  => 'Lorem ipsum dolor sit ',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>