<?php 
/* SVN FILE: $Id$ */
App::import('Component', 'UploadComponent', array('file' => 'upload.php'));

class UploadComponentTestCase extends CakeTestCase {

	function testResize() {
		$config = array(
			'image_library'	=> 'gd2',
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
		$dest_file = $this->UploadComponentTest->getFileAbsolutePath();
		$this->assertTrue( file_exists( $dest_file ) );
	}
	
	function testCrop() {
		$config = array(
			'image_library'	=> 'magickwand',
			'encrypt_name'	=> TRUE,
			'operate' 		=> 'crop',	
			'upload_type' 	=> 'article',
			'width'			=> 200,
			'height'		=> 30,
			'x_axis'		=> 50,
			'y_axis'		=> 20,
		);
		
		$this->UploadComponentTest = new UploadComponent();
		$controller = new FakeUploadController();
		$this->UploadComponentTest->initialize($controller, $config);
		$this->UploadComponentTest->upload('thumbnail','Image');
		$dest_file = $this->UploadComponentTest->getFileAbsolutePath();
		$this->assertTrue( file_exists( $dest_file ) );
		
	}
	
	function testRotate() {
		$config = array(
			'image_library'	=> 'magickwand',
			'encrypt_name'	=> TRUE,
			'operate' 		=> 'rotate',	
			'upload_type' 	=> 'article',
			'rotation_angle'=> 270,
		);
		
		$this->UploadComponentTest = new UploadComponent();
		$controller = new FakeUploadController();
		$this->UploadComponentTest->initialize($controller, $config);
		$this->UploadComponentTest->upload('thumbnail','Image');
		$dest_file = $this->UploadComponentTest->getFileAbsolutePath();
		$this->assertTrue( file_exists( $dest_file ) );
		
	}

	function testWatermark() {
		$config = array(
			'image_library'	=> 'magickwand',
			'encrypt_name'	=> TRUE,
			'operate' 		=> 'watermark',	
			'upload_type' 	=> 'article',
		
			'wm_text'=> "http://www.35vt.com",
			'wm_font_color'	=> 'ff0000',
		);
		
		$this->UploadComponentTest = new UploadComponent();
		$controller = new FakeUploadController();
		$this->UploadComponentTest->initialize($controller, $config);
		$this->UploadComponentTest->upload('thumbnail','Image');
		$dest_file = $this->UploadComponentTest->getFileAbsolutePath();
		$this->assertTrue( file_exists( $dest_file ) );
		
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