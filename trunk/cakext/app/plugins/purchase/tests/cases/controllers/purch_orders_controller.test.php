<?php 
/* SVN FILE: $Id$ */
/* PurchOrdersController Test cases generated on: 2009-06-18 09:06:25 : 1245289765*/
App::import('Controller', 'Purchase.PurchOrders');

class TestPurchOrders extends PurchOrdersController {
	var $autoRender = false;
}

class PurchOrdersControllerTest extends CakeTestCase {
	var $PurchOrders = null;

	function setUp() {
		$this->PurchOrders = new TestPurchOrders();
		$this->PurchOrders->constructClasses();
	}

	function testPurchOrdersControllerInstance() {
		$this->assertTrue(is_a($this->PurchOrders, 'PurchOrdersController'));
	}

	function tearDown() {
		unset($this->PurchOrders);
	}
}
?>