<?php
/* Mauths Test cases generated on: 2011-06-14 12:33:16 : 1308025996*/
App::import('Controller', 'Oauth.Mauths');

class TestMauthsController extends MauthsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MauthsControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Mauths =& new TestMauthsController();
		$this->Mauths->constructClasses();
	}

	function endTest() {
		unset($this->Mauths);
		ClassRegistry::flush();
	}

}
?>