<?php
class MailServer extends WebmaillerAppModel {

	var $name = 'MailServer';
	var $validate = array(
		'host' => array('notempty')
	);

}
?>