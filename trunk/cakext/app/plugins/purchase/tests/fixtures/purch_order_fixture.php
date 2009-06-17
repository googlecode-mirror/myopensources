<?php 
/* SVN FILE: $Id$ */
/* PurchOrder Fixture generated on: 2009-06-17 14:06:42 : 1245248922*/

class PurchOrderFixture extends CakeTestFixture {
	var $name = 'PurchOrder';
	var $table = 'purch_orders';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'supplier_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'ord_date' => array('type'=>'date', 'null' => true, 'default' => NULL),
			'del_add' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'contact' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
			'status' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 8),
			'memo' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_supp_id' => array('column' => 'supplier_id', 'unique' => 0))
			);
	var $records = array(array(
			'id'  => 1,
			'supplier_id'  => 1,
			'ord_date'  => '2009-06-17',
			'del_add'  => 'Lorem ipsum dolor sit amet',
			'contact'  => 'Lorem ipsum dolor sit amet',
			'status'  => 'Lorem ',
			'memo'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => 1,
			'modified'  => 1
			));
}
?>