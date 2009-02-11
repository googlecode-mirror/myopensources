<?php 
/* SVN FILE: $Id$ */
App::import('Helper', 'Thumbnail');

class ThumbnailHelperTestCase extends CakeTestCase {
	var $ThumbnailHelper;
	var $config;

	function setUp() {
		$this->ThumbnailHelper = new ThumbnailHelper();
		$this->config = array();
	}
	
	function testLocalThumbnail() {
		$image_file = "uploads/article/2009/0210/355edbe4f9889103e0735903aeb393a0.png";
		$this->ThumbnailHelper->show($image_file, $this->config);
	}
	
	function testRemoteThumbnail() {
		
		$image_file = "http://www.35vt.com/public/images/he-zhou/logo.gif";
		$this->ThumbnailHelper->show($image_file, $this->config);
	}
	
	
}

?>