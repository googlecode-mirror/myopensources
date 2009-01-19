<?php
class UsersController extends AppController {

	var $name = 'Users';
	
	function beforeFilter() {
		parent::beforeFilter();
		
        $successRedirect = array(Configure::read('Routing.admin') => true, 'controller' => 'dashboard', 'action' => 'index');
        $this->Auths->setSuccessRedirect( $successRedirect );
		
		
	}
	
	
    function login() {
    	$this->layout = 'admin_login';
    }

    function logout() {
        $this->redirect( $this->Auths->logout() );
    }
	
}
?>