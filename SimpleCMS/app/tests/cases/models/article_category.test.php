<?php 
/* SVN FILE: $Id$ */
/* ArticleCategory Test cases generated on: 2009-01-15 13:01:42 : 1231997682*/
App::import('Model', 'ArticleCategory');

class ArticleCategoryTestCase extends CakeTestCase {
	var $ArticleCategory = null;
	var $fixtures = array('app.article_category');

	function startTest() {
		$this->ArticleCategory =& ClassRegistry::init('ArticleCategory');
	}

	function testArticleCategoryInstance() {
		$this->assertTrue(is_a($this->ArticleCategory, 'ArticleCategory'));
	}

	function testArticleCategoryFind() {
		$this->ArticleCategory->recursive = -1;
		$results = $this->ArticleCategory->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ArticleCategory' => array(
			'id'  => 1,
			'pid'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>