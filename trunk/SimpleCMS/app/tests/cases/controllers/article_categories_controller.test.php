<?php 
/* SVN FILE: $Id$ */
/* ArticleCategoriesController Test cases generated on: 2009-01-15 13:01:44 : 1231997744*/
App::import('Controller', 'ArticleCategories');

class TestArticleCategories extends ArticleCategoriesController {
	var $autoRender = false;
}

class ArticleCategoriesControllerTest extends CakeTestCase {
	var $ArticleCategories = null;

	function setUp() {
		$this->ArticleCategories = new TestArticleCategories();
		$this->ArticleCategories->constructClasses();
	}

	function testArticleCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->ArticleCategories, 'ArticleCategoriesController'));
	}

	function tearDown() {
		unset($this->ArticleCategories);
	}
}
?>