<?php
class Financy extends FinanceAppModel {

	var $name = 'Financy';
	var $validate = array(
		'finance_category_id' => array('notempty'),
		'create_date' => array('notempty'),
		'amount' => array('notempty'),
		'debit' => array('notempty'),
		'money' => array('notempty'),
		'active' => array('notempty'),
		'groupid' => array('notempty'),
		'userid' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'FinanceCategory' => array('className' => 'FinanceCategory',
								'foreignKey' => 'finance_category_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>