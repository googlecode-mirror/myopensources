<?php
/* Image Test cases generated on: 2011-03-31 17:19:19 : 1301563159*/
App::import('Model', 'Image');

class ImageTestCase extends CakeTestCase {
//	var $fixtures = array('app.image');

	function startTest() {
		$this->Image =& ClassRegistry::init('Image');
	}

	function endTest() {
		unset($this->Image);
		ClassRegistry::flush();
	}
	
	function testAdd() {
		
		for ($index = 1; $index < 41; $index++) {
			$records[] = array(
					'aid' => $index,
					'uri' => 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg',
				);
				
			$records[] = array(
					'aid' => $index,
					'uri' => 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg',
				);
			$records[] = array(
					'aid' => $index,
					'uri' => 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg',
				);
			$records[] = array(
					'aid' => $index,
					'uri' => 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg',
				);
			$records[] = array(
					'aid' => $index,
					'uri' => 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg',
				);
				
		}
				
		$this->Image->saveAll($records);
		
	}
	
}
?>