<?php
/* Score Test cases generated on: 2011-03-31 17:18:58 : 1301563138*/
App::import('Model', 'Score');

class ScoreTestCase extends CakeTestCase {
//	var $fixtures = array('app.score');

	function startTest() {
		$this->Score =& ClassRegistry::init('Score');
	}

	function endTest() {
		unset($this->Score);
		ClassRegistry::flush();
	}
	
	function testAdd() {
		
		for ($index = 1; $index < 21; $index++) {
			$records[] = 		array(
					'aid' => $index,
					'score' => mt_rand(0, 9),
					'download_uri' => 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=',
					'source' => 1,
				);
				
			$records[] = 		array(
					'aid' => $index,
					'score' => mt_rand(0, 9),
					'download_uri' => 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=',
					'source' => 2,
				);
				
			$records[] = 		array(
					'aid' => $index,
					'score' => mt_rand(0, 9),
					'download_uri' => 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=',
					'source' => 3,
				);
		}
				
		$this->Score->saveAll($records);
		
	}
	
}
?>