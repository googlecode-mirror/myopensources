<?php
class MailCustomerCategory extends WebmaillerAppModel {

	var $name = 'MailCustomerCategory';
	var $validate = array(
		'name' => array('notempty'),
		'active' => array('notempty')
	);

}
?>