<?php
class MailCustomer extends WebmaillerAppModel {

	var $name = 'MailCustomer';
	var $validate = array(
		'nickname' => array('notempty'),
		'gender' => array('notempty'),
		'email' => array('notempty')
	);
	var $belongsTo = array(
			'MailCustomerCategory' => array('className' => 'Webmailler.MailCustomerCategory',
								'foreignKey' => 'mail_customer_categories_id',
								'conditions' => array('MailCustomerCategory.id = MailCustomer.mail_customer_categories_id'),
								'fields' => 'name',
		),
			
	);
	
}
?>