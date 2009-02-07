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
	
	var $data ;
	function FakeImageLibController() {
		$this->data = array(
						'Image' => array(
									'thumbnail'	=> array(
										'type' => 'image/jpeg',
										'size' => 10,
										'tmp_name' => dirname( dirname(__FILE__) ) . DS. 'files'. DS . "hot_topic081218.jpg",
		
									),
								
						),
			);
	}
}

?>