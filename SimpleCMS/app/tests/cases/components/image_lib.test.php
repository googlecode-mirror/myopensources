<?php 
/* SVN FILE: $Id$ */
App::import('Component', 'ImageLibComponent', array('file' => 'image_lib.php'));

class ImageLibComponentTestCase extends CakeTestCase {

	function testResize() {
		$this->ImageLibComponentTest = new ImageLibComponent();
		$controller = new FakeImageLibController();
		$this->ImageLibComponentTest->startup($controller);
		$this->ImageLibComponentTest->resize('thumbnail','Image'); 
	}
	
}

class FakeImageLibController {
	
	var $data = array(
					'Image' => array(
								'thumbnail'	=> array(
									'type' => 'image/png',
									'size' => 10,
									'tmp_name' => '/tmp/cache-apc-vs-memcache.png',
	
								),
							
					),
		);
}

?>