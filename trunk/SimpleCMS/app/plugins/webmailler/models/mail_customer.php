<?php
class MailCustomer extends WebmaillerAppModel {

	var $name = 'MailCustomer';
	var $validate = array(
		'nickname' => array('notempty'),
		'gender' => array('notempty'),
		'email' => array('notempty')
	);

}
?>