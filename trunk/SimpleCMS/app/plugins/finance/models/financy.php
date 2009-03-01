<?php
class Financy extends FinanceAppModel {

	var $name = 'Financy';
	var $validate = array(
		'finance_categories_id' => array('notempty'),
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
			'FinanceCategory' => array('className' => 'Finance.FinanceCategory',
								'foreignKey' => 'finance_categories_id',
								'conditions' => array('FinanceCategory.id = Financy.finance_categories_id'),
								'fields' => 'category_name',
								'order' => ''
			),
			
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => array('User.id = Financy.user_id'),
								'fields' => 'username',
								'order' => ''
			),
			
	);

}
?>