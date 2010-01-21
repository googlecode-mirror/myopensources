<?php
class MailCustomer extends WebmaillerAppModel {

	var $name = 'MailCustomer';
	var $validate = array(
		'mail_customer_category_id' => array('numeric'),
		'nickname' => array('notempty'),
		'gender' => array('notempty'),
		'email' => array('email')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'MailCustomerCategory' => array('className' => 'Webmailler.MailCustomerCategory',
								'foreignKey' => 'mail_customer_category_id',
								'conditions' => '',
								'fields' => 'id, name',
								'order' => ''
			)
	);

}
?>