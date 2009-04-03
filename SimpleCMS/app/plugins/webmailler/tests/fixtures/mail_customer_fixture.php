<?php 
/* SVN FILE: $Id$ */
/* MailCustomer Fixture generated on: 2009-04-03 15:04:05 : 1238744945*/

class MailCustomerFixture extends CakeTestFixture {
	var $name = 'MailCustomer';
	var $table = 'mail_customers';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'nickname' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
			'gender' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
			'email' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45, 'key' => 'unique'),
			'tel' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
			'memo' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'email' => array('column' => 'email', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'nickname'  => 'Lorem ipsum dolor sit amet',
			'gender'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'tel'  => 'Lorem ipsum dolor sit amet',
			'memo'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => 1
			));
}
?>