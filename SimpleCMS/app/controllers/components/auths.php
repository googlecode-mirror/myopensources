<?php
App::import('Component', 'Auth');
class AuthsComponent extends AuthComponent {
	
	function password($password) {
//		debug(md5($password));
	
		return Security::hash($password, 'md5', false);
	}
}

