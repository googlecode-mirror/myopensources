<?php
class Arzen_Oauth_ServerTest extends PHPUnit_Framework_TestCase {
	
	protected $_model;
	
	public function setUp() {
		$this->_model = new Arzen_Oauth_Server();
	}
	
	public function testBase() {
		global $config;
		$requestToken = $this->_model->getRequestToken();
		echo $requestToken;
		echo $config->sina->appid;
		$this->assertEquals("dd", $requestToken);
	}
	
}