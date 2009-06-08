<?php
class Inventory extends InventoryAppModel {

	var $name = 'Inventory';
	var $validate = array(
		'name' => array('notempty'),
		'address' => array('notempty')
	);

}
?>