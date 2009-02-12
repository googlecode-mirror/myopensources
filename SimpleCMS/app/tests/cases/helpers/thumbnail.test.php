<?php 
/* SVN FILE: $Id$ */
App::import('Helper', 'Thumbnail');

class ThumbnailHelperTestCase extends CakeTestCase {
	var $ThumbnailHelper;
	var $config;

	function setUp() {
		$this->ThumbnailHelper = new ThumbnailHelper();
		$this->config = array(
			'width'			=> 60,
			'height'		=> 60,
		);
	}
	
	function testLocalThumbnail() {
		$file_name = "hot_topic081218.jpg";
		$org_file = dirname( dirname(__FILE__) ) . DS. 'files'. DS . $file_name;
		$tmp_file = WWW_ROOT . IMAGES_URL . $file_name;
		if ( !file_exists($tmp_file) ) {
			copy($org_file, $tmp_file);
		}
		
		$this->ThumbnailHelper->thumb($file_name, $this->config);
		unlink($tmp_file);
		
		$dest_file = $this->ThumbnailHelper->getFileAbsolutePath();
		$this->assertTrue( file_exists( $dest_file ) );
		
	}
	
	function testRemoteThumbnail() {
		
		$image_file = "http://www.35vt.com/public/images/he-zhou/logo.gif";
		$this->ThumbnailHelper->thumb($image_file, $this->config);
		
		$dest_file = $this->ThumbnailHelper->getFileAbsolutePath();
		$this->assertTrue( file_exists( $dest_file ) );
	}
	
	
}

?>