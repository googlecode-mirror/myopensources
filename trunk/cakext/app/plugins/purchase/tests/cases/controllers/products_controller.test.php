<?php 
/* SVN FILE: $Id$ */
/* ProductsController Test cases generated on: 2009-06-22 15:06:26 : 1245656846*/
App::import('Controller', 'Purchase.Products');

class TestProducts extends ProductsController {
	var $autoRender = false;
}

class ProductsControllerTest extends CakeTestCase {
	var $Products = null;

	function setUp() {
		$this->Products = new TestProducts();
		$this->Products->constructClasses();
	}

	function testProductsControllerInstance() {
		$this->assertTrue(is_a($this->Products, 'ProductsController'));
	}

	function tearDown() {
		unset($this->Products);
	}
}
?>