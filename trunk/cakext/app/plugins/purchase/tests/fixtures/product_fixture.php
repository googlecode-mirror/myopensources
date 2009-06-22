<?php 
/* SVN FILE: $Id$ */
/* Product Fixture generated on: 2009-06-22 15:06:04 : 1245656824*/

class ProductFixture extends CakeTestFixture {
	var $name = 'Product';
	var $table = 'products';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'code' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 80),
			'categoryid' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
			'description' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'units' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 12),
			'barcode' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'kgs' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => '20,4'),
			'photo' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 120),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_cat_id' => array('column' => 'categoryid', 'unique' => 0))
			);
	var $records = array(array(
			'id'  => 1,
			'code'  => 'Lorem ipsum dolor sit amet',
			'categoryid'  => 1,
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'units'  => 'Lorem ipsu',
			'barcode'  => 'Lorem ipsum dolor sit amet',
			'kgs'  => 'Lorem ipsum dolor sit amet',
			'photo'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
}
?>