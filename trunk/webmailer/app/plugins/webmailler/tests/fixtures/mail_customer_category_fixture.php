<?php 
/* SVN FILE: $Id$ */
/* MailCustomerCategory Fixture generated on: 2009-04-05 04:04:54 : 1238907174*/

class MailCustomerCategoryFixture extends CakeTestFixture {
	var $name = 'MailCustomerCategory';
	var $table = 'mail_customer_categories';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 60),
			'active' => array('type'=>'string', 'null' => false, 'default' => 'new', 'length' => 8),
			'add_ip' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 24),
			'created' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'active'  => 'Lorem ',
			'add_ip'  => 'Lorem ipsum dolor sit ',
			'created'  => 1,
			'modified'  => 1
			));
}
?>