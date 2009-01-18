<?php
class UsersController extends AppController {

	var $name = 'Users';
	
    function login() {
    	$this->layout = 'admin_login';
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
	
}
?>