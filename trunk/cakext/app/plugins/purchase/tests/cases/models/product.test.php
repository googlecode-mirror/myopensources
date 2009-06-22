<?php 
/* SVN FILE: $Id$ */
/* Product Test cases generated on: 2009-06-22 15:06:04 : 1245656824*/
App::import('Model', 'Purchase.Product');

class ProductTestCase extends CakeTestCase {
	var $Product = null;
	var $fixtures = array('plugin.purchase.product');

	function startTest() {
		$this->Product =& ClassRegistry::init('Product');
	}

	function testProductInstance() {
		$this->assertTrue(is_a($this->Product, 'Product'));
	}

	function testProductFind() {
		$this->Product->recursive = -1;
		$results = $this->Product->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Product' => array(
			'id'  => 1,
			'code'  => 'Lorem ipsum dolor sit amet',
			'categoryid'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'units'  => 'Lorem ipsu',
			'barcode'  => 'Lorem ipsum dolor sit amet',
			'kgs'  => 'Lorem ipsum dolor sit amet',
			'photo'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>