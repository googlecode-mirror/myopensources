<?php
/* Application Fixture generated on: 2011-03-31 17:19:43 : 1301563183 */
class ApplicationFixture extends CakeTestFixture {
	var $name = 'Application';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cid' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '分类ID'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 120, 'collate' => 'ucs2_general_ci', 'comment' => '软件名称', 'charset' => 'ucs2'),
		'score' => array('type' => 'float', 'null' => true, 'default' => '0.0', 'length' => '3,1', 'comment' => '综合得分'),
		'content' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'ucs2_general_ci', 'comment' => '软件描述', 'charset' => 'ucs2'),
		'price' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '8,2', 'comment' => '价格'),
		'author' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'ucs2_general_ci', 'comment' => '作者', 'charset' => 'ucs2'),
		'upload_time' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '软件更新时间'),
		'downloads' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '周下载量'),
		'size' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10, 'collate' => 'ucs2_general_ci', 'comment' => '软件大小', 'charset' => 'ucs2'),
		'os' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'ucs2_general_ci', 'comment' => '支持的OS版本,如：1.5,1.6.....以逗号分隔', 'charset' => 'ucs2'),
		'created' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '创建时间'),
		'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '更新时间'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'ucs2', 'collate' => 'ucs2_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'cid' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'score' => 1,
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'price' => 1,
			'author' => 'Lorem ipsum dolor sit amet',
			'upload_time' => 1,
			'downloads' => 1,
			'size' => 'Lorem ip',
			'os' => 'Lorem ipsum dolor ',
			'created' => 1,
			'modified' => 1
		),
	);
}
?>