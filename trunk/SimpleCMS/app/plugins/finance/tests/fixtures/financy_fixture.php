<?php 
/* SVN FILE: $Id$ */
/* Financy Fixture generated on: 2009-02-22 14:02:26 : 1235313746*/

class FinancyFixture extends CakeTestFixture {
	var $name = 'Financy';
	var $table = 'financies';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'finance_category_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 5),
			'create_date' => array('type'=>'date', 'null' => true, 'default' => NULL),
			'amount' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 4),
			'debit' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 4),
			'money' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => '10,2'),
			'memo' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'active' => array('type'=>'string', 'null' => false, 'default' => 'new', 'length' => 8),
			'access' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 8),
			'groupid' => array('type'=>'string', 'null' => false, 'default' => '0', 'length' => 11),
			'userid' => array('type'=>'integer', 'null' => false, 'default' => '0'),
			'add_ip' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 24),
			'created' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'finance_category_id'  => 1,
			'create_date'  => '2009-02-22',
			'amount'  => 1,
			'debit'  => 'Lo',
			'money'  => 'Lo',
			'memo'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'active'  => 'Lorem ',
			'access'  => 'Lorem ',
			'groupid'  => 'Lorem ips',
			'userid'  => 1,
			'add_ip'  => 'Lorem ipsum dolor sit ',
			'created'  => 1,
			'modified'  => 1
			));
}
?>