<?php 
/* SVN FILE: $Id$ */
/* StockCategory Test cases generated on: 2009-06-22 16:06:40 : 1245660220*/
App::import('Model', 'Purchase.StockCategory');

class StockCategoryTestCase extends CakeTestCase {
	var $StockCategory = null;
	var $fixtures = array('plugin.purchase.stock_category');

	function startTest() {
		$this->StockCategory =& ClassRegistry::init('StockCategory');
	}

	function testStockCategoryInstance() {
		$this->assertTrue(is_a($this->StockCategory, 'StockCategory'));
	}

	function testStockCategoryFind() {
		$this->StockCategory->recursive = -1;
		$results = $this->StockCategory->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('StockCategory' => array(
			'id'  => 1,
			'code'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>