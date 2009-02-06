<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2008-12-31 11:12:37 : 1230693577*/
App::import("Vendor", "Image_Lib", array('file' => 'Image'.DS.'Lib.php') );

class StoreTestCase extends CakeTestCase {

	function startTest() {

	}


	function testResize() {
		$config = array();
		$config['image_library'] = 'magickwand';
		$config['source_image'] = '/tmp/cache-apc-vs-memcache.png';
		$config['new_image'] = '/tmp/cache-apc-vs-memcache-resize.png';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 180;
		$config['height'] = 180;
		$img = new Image_Lib($config);
		$img->resize();
	}
}
?>