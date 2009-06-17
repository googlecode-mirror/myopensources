<?php 
/* SVN FILE: $Id$ */
/* PurchOrder Test cases generated on: 2009-06-17 14:06:42 : 1245248922*/
App::import('Model', 'Purchase.PurchOrder');

class PurchOrderTestCase extends CakeTestCase {
	var $PurchOrder = null;
	var $fixtures = array('plugin.purchase.purch_order');

	function startTest() {
		$this->PurchOrder =& ClassRegistry::init('PurchOrder');
	}

	function testPurchOrderInstance() {
		$this->assertTrue(is_a($this->PurchOrder, 'PurchOrder'));
	}

	function testPurchOrderFind() {
		$this->PurchOrder->recursive = -1;
		$results = $this->PurchOrder->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('PurchOrder' => array(
			'id'  => 1,
			'supplier_id'  => 1,
			'ord_date'  => '2009-06-17',
			'del_add'  => 'Lorem ipsum dolor sit amet',
			'contact'  => 'Lorem ipsum dolor sit amet',
			'status'  => 'Lorem ',
			'memo'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>