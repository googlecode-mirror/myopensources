<?php 
/* SVN FILE: $Id$ */
App::import('Component', 'UploadComponent', array('file' => 'upload.php'));

class UploadComponentTestCase extends CakeTestCase {

	function testResize() {
		$config = array(
			'image_library'	=> 'gd2',
			'encrypt_name'	=> FALSE,
			'encrypt_name' 	=> TRUE,
			'operate' 		=> 'resize',	
			'upload_type' 	=> 'article',
			'width'			=> 120,
			'height'		=> 120,
		);
		
		$this->UploadComponentTest = new UploadComponent();
		$controller = new FakeUploadController();
		$this->UploadComponentTest->initialize($controller, $config);
		$this->UploadComponentTest->upload('thumbnail','Image'); 
	}
	
}

class FakeUploadController {
	
	var $data ;
	function FakeUploadController() {
		$this->data = array(
						'Image' => array(
									'thumbnail'	=> array(
										'type' => 'image/jpeg',
										'size' => 10,
										'tmp_name' => dirname( dirname(__FILE__) ) . DS. 'files'. DS . "hot_topic081218.jpg",
										'name'	=> 'test.jpg',
		
									),
								
						),
			);
	}
}

?>