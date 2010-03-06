<?php
App::import('Component', 'Auth');
class AuthsComponent extends AuthComponent {

	var $successedRedirect = null;

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

