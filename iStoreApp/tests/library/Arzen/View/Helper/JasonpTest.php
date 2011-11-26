<?php
class Arzen_View_Helper_JasonpTest extends PHPUnit_Framework_TestCase {
	
	function testJasonp() {
		$data = array(
			"key"=>"app",
			"value"=>"www.data.com",
		);
		$helper = new Arzen_View_Helper_Jasonp();
		echo $helper->jsonp($data, "ddd");
	}
}