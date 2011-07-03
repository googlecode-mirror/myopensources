<?php
/* Application Test cases generated on: 2011-03-31 17:40:16 : 1301564416*/
App::import('Model', 'Application');

class ApplicationTestCase extends CakeTestCase {
//	var $fixtures = array('app.application');

	function startTest() {
		$this->Application =& ClassRegistry::init('Application');
	}

	function endTest() {
		unset($this->Application);
		ClassRegistry::flush();
	}
	function testAdd() {
		
		$tmp = array(
			'icon' => 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png',
			'pid' => 2,
			'cid' => mt_rand(22, 33),
			'name' => '联通手机营业厅',
			'score' => 8,
			'content' => '联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。',
			'price' => 0,
			'author' => '优友',
			'upload_time' => time(),
			'downloads' => 8000,
			'size' => '594.57 K',
			'os' => '1.6,2.0,2.0.1,2.1,2.2',
			'apk_url' => 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=',
			'published' => 1,
		);
		
		$records = array();
		
		for ($index = 20; $index < 40; $index++) {
			$item = $tmp;
			$item['name'] = $index . $item['name'];
			$item['content'] = $index . $item['content'];
			$records[] = $item;
		}
				
		$this->Application->saveAll($records);
	}
	
}
?>