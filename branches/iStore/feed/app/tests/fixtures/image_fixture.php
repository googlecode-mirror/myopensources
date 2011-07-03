<?php
/* Image Fixture generated on: 2011-03-31 17:19:19 : 1301563159 */
class ImageFixture extends CakeTestFixture {
	var $name = 'Image';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'aid' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '对应于Applications表的ID'),
		'uri' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'ucs2_general_ci', 'comment' => '图片的URI位置', 'charset' => 'ucs2'),
		'created' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '创建时间'),
		'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '更新时间'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'ucs2', 'collate' => 'ucs2_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'aid' => 1,
			'uri' => 'Lorem ipsum dolor sit amet',
			'created' => 1,
			'modified' => 1
		),
	);
}
?>