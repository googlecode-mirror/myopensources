<?php
class ProductsController extends PurchaseAppController {

	var $name = 'Products';
	var $helpers = array('Html', 'Form');

	function add() {
		if (!empty($this->data)) {
			$this->autoRender = false;
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				echo "{success:true,msg:'OK'}";
				exit;
			}
		}
	}

}
?>