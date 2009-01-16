<?php
class UsersController extends AppController {

	var $name = 'Users';
	
    function beforeFilter() {
        $this->Auth->fields = array(
            'username' => 'username', 
            'password' => 'secretword'
            );
    }
	
    function login() {
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
	
}
?>