<?php
/* Category Fixture generated on: 2011-03-31 06:47:42 : 1301554062 */
class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'ucs2_general_ci', 'comment' => '分类名称', 'charset' => 'ucs2'),
		'pid' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'comment' => '所属类别：1 为应用； 2 为游戏'),
		'addip' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 24, 'collate' => 'ucs2_general_ci', 'comment' => '操作者的IP', 'charset' => 'ucs2'),
		'created' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '创建时间'),
		'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '最后更新时间'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'ucs2', 'collate' => 'ucs2_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'pid' => 1,
			'addip' => 'Lorem ipsum dolor sit ',
			'created' => 1,
			'modified' => 1
		),
	);
}
?>