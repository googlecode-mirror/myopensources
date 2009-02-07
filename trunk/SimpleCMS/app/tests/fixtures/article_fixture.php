<?php 
/* SVN FILE: $Id$ */
/* Article Fixture generated on: 2009-02-07 09:02:33 : 1233997773*/

class ArticleFixture extends CakeTestFixture {
	var $name = 'Article';
	var $table = 'articles';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'article_categories_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'title' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 250),
			'contents' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'photo' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 60),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'article_categories_id'  => 1,
			'title'  => 'Lorem ipsum dolor sit amet',
			'contents'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'photo'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
}
?>