<?php
class MailTemplate extends WebmaillerAppModel {

	var $name = 'MailTemplate';
	var $validate = array(
		'title' => array('notempty'),
		'subject' => array('notempty'),
		'content' => array('notempty')
	);

}
?>