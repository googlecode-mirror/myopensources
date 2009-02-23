<?php 
/* SVN FILE: $Id$ */
/* Financy Test cases generated on: 2009-02-23 21:02:41 : 1235397581*/
App::import('Model', 'Finance.Financy');

class FinancyTestCase extends CakeTestCase {
	var $Financy = null;
	var $fixtures = array('plugin.finance.financy', 'plugin.finance.finance_categories');

	function startTest() {
		$this->Financy =& ClassRegistry::init('Financy');
	}

	function testFinancyInstance() {
		$this->assertTrue(is_a($this->Financy, 'Financy'));
	}

	function testFinancyFind() {
		$this->Financy->recursive = -1;
		$results = $this->Financy->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Financy' => array(
			'id'  => 1,
			'finance_categories_id'  => 1,
			'create_date'  => '2009-02-23',
			'amount'  => 1,
			'debit'  => 'Lo',
			'money'  => 'Lo',
			'memo'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'active'  => 'Lorem ',
			'access'  => 'Lorem ',
			'groupid'  => 'Lorem ips',
			'userid'  => 1,
			'add_ip'  => 'Lorem ipsum dolor sit ',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>