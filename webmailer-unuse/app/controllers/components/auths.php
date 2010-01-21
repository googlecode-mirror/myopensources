<?php
App::import('Component', 'Auth');
class AuthsComponent extends AuthComponent {
	
	var $successedRedirect = null;
	
	function setSuccessRedirect($value) {
		$this->successedRedirect = $value;
//		debug($this->successedRedirec);
	}
	
	function redirect($url = null) {
//		if (!is_null($url)) {
//			$redir = $url;
//			$this->Session->write('Auth.redirect', $redir);
//		} elseif ($this->Session->check('Auth.redirect')) {
//			$redir = $this->Session->read('Auth.redirect');
//			$this->Session->delete('Auth.redirect');
//
//			if (Router::normalize($redir) == Router::normalize($this->loginAction)) {
//				$redir = $this->loginRedirect;
//			}
//		} else {
//			$redir = $this->loginRedirect;
//		}
		$this->successedRedirect = array(Configure::read('Routing.admin') => true, 'controller' => 'dashboard', 'action' => 'index');
//		var_dump($this->successedRedirect);
		return Router::normalize($this->successedRedirect);
	}
	
	function password($password) {
		return Security::hash($password, 'md5', false);
	}
	
}

