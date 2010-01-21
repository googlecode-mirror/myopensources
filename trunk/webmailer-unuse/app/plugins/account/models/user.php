<?php
class User extends AccountAppModel {

	var $name = 'User';
	var $validate = array(
		'username' => array('notempty'),
		'gender' => array('notempty'),
		'realname' => array('notempty'),
		'birthday' => array('date'),
		'marriage' => array('notempty'),
		'addrees' => array('notempty'),
		'phone' => array('phone'),
		'mobile' => array('phone'),
		'email' => array('email'),
		'user_id' => array('numeric')
	);

}
?>