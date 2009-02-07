<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2008-12-31 11:12:37 : 1230693577*/
App::import("Vendor", "Image_Lib", array('file' => 'Image'.DS.'Lib.php') );

class ImageLibTestCase extends CakeTestCase {

	function startTest() {

	}


	function testResize() {
		$config = array();
		$config['image_library'] = 'gd2';
		$config['source_image'] = dirname( dirname(__FILE__) ) . DS. 'files'. DS . "hot_topic081218.jpg";
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 180;
		$config['height'] = 180;
		$img = new Image_Lib($config);
		$img->resize();
		
		
	}
}
?>