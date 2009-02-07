<?php 
/* SVN FILE: $Id$ */
/* Article Test cases generated on: 2009-02-07 09:02:34 : 1233997774*/
App::import('Model', 'Article');

class ArticleTestCase extends CakeTestCase {
	var $Article = null;
	var $fixtures = array('app.article', 'app.article_categories');

	function startTest() {
		$this->Article =& ClassRegistry::init('Article');
	}

	function testArticleInstance() {
		$this->assertTrue(is_a($this->Article, 'Article'));
	}

	function testArticleFind() {
		$this->Article->recursive = -1;
		$results = $this->Article->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Article' => array(
			'id'  => 1,
			'article_categories_id'  => 1,
			'title'  => 'Lorem ipsum dolor sit amet',
			'contents'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'photo'  => 'Lorem ipsum dolor sit amet',
			'created'  => 1,
			'modified'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>