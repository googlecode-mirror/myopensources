<?php 
/* SVN FILE: $Id$ */
/* ArticlesController Test cases generated on: 2009-02-07 09:02:43 : 1233997843*/
App::import('Controller', 'Articles');

class TestArticles extends ArticlesController {
	var $autoRender = false;
}

class ArticlesControllerTest extends CakeTestCase {
	var $Articles = null;

	function setUp() {
		$this->Articles = new TestArticles();
		$this->Articles->constructClasses();
	}

	function testArticlesControllerInstance() {
		$this->assertTrue(is_a($this->Articles, 'ArticlesController'));
	}

	function tearDown() {
		unset($this->Articles);
	}
}
?>