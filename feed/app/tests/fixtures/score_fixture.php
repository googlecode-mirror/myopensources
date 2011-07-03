<?php
/* Score Fixture generated on: 2011-03-31 17:18:58 : 1301563138 */
class ScoreFixture extends CakeTestFixture {
	var $name = 'Score';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'aid' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '应用程序ID，对应于Applications表ID'),
		'score' => array('type' => 'float', 'null' => true, 'default' => '0.0', 'length' => '3,1', 'comment' => '评分'),
		'download_uri' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 250, 'collate' => 'ucs2_general_ci', 'comment' => '下载URI', 'charset' => 'ucs2'),
		'source' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'comment' => '来源：1安智网, 2泡椒网，3机锋网'),
		'created' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '创建时间'),
		'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => '修改时间'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'ucs2', 'collate' => 'ucs2_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'aid' => 1,
			'score' => 1,
			'download_uri' => 'Lorem ipsum dolor sit amet',
			'source' => 1,
			'created' => 1,
			'modified' => 1
		),
	);
}
?>