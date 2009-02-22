<?php 
/* SVN FILE: $Id$ */
/* FinanceCategory Test cases generated on: 2009-02-21 17:02:52 : 1235209072*/
App::import('Model', 'Finance.FinanceCategory');

class FinanceCategoryTestCase extends CakeTestCase {
	var $FinanceCategory = null;
	var $fixtures = array('app.finance_category');

	function startTest() {
		$this->FinanceCategory =& ClassRegistry::init('Finance.FinanceCategory');
	}

	function testFinanceCategoryInstance() {
		$this->assertTrue(is_a($this->FinanceCategory, 'FinanceCategory'));
	}

	function testFinanceCategoryFind() {
		$this->FinanceCategory->recursive = -1;
		$results = $this->FinanceCategory->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('FinanceCategory' => array(
			'id'  => 1,
			'category_name'  => 'Lorem ipsum dolor sit amet',
			'active'  => 'Lorem ',
			'add_ip'  => 'Lorem ipsum dolor sit ',
			'created'  => '2009-02-21 17:37:52',
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>