<?php
App::import('Component', 'Auth');
class AuthsComponent extends AuthComponent {

	var $autoRedirect = false;

	function password($password) {
		return Security::hash($password, 'md5', false);
	}

}

