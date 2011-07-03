<?php
App::import('Component', 'Auth');
class AuthsComponent extends AuthComponent {

	var $fields = array('username' => 'username', 'password' => 'passwd');
//	var $successedRedirect = null;
//	var $autoRedirect = false;


	function setSuccessRedirect($value) {
		$this->successedRedirect = $value;
//		debug($this->successedRedirec);
	}

	function redirect($url = null) {
		$this->successedRedirect = array(Configure::read('Routing') => true, 'controller' => 'dashboard', 'action' => 'index');
		return Router::normalize($this->successedRedirect);
	}

	function password($password) {
		return $password;//Security::hash($password, 'sha1', false);
	}

}

