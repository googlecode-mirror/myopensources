<?php 
/* SVN FILE: $Id$ */
/* MailServer Fixture generated on: 2009-04-02 12:04:27 : 1238675067*/

class MailServerFixture extends CakeTestFixture {
	var $name = 'MailServer';
	var $table = 'mail_servers';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'host' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 120, 'key' => 'unique'),
			'ssl' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 1),
			'port' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 4),
			'account' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 120),
			'passwd' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 60),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'host' => array('column' => 'host', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'host'  => 'Lorem ipsum dolor sit amet',
			'ssl'  => 1,
			'port'  => 'Lo',
			'account'  => 'Lorem ipsum dolor sit amet',
			'passwd'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1
			));
}
?>