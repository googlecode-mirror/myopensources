<?php
class FinanceCategory extends FinanceAppModel {

	var $name = 'FinanceCategory';
	var $validate = array(
		'category_name' => array('notempty'),
		'active' => array('notempty')
	);

}
?>