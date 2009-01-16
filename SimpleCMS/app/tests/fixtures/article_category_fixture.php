<?php 
/* SVN FILE: $Id$ */
/* ArticleCategory Fixture generated on: 2009-01-15 13:01:42 : 1231997682*/

class ArticleCategoryFixture extends CakeTestFixture {
	var $name = 'ArticleCategory';
	var $table = 'article_categories';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'pid' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
			'created' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'pid'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
}
?>