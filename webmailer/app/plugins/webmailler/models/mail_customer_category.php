<?php
class MailCustomerCategory extends WebmaillerAppModel {

	var $name = 'MailCustomerCategory';
	var $hasMany = array(
		'MailCustomer' => array(
		    'className'  => 'MailCustomer',
			'foreignKey' => 'mail_customer_category_id',
			'dependent' => true,
		)
	);
	
	var $validate = array(
		'name' => array('notempty'),
		'active' => array('notempty')
	);

	function delIds($id_data) {
		if (empty($id_data)) {
			return false;
		}
		foreach ($id_data as $id){
			$this->del($id, true);
		}
		return true;
	}
	
}
?>