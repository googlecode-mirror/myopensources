<?php
class UsersController extends AppController {

	var $name = 'Users';

	function beforeFilter() {
		parent::beforeFilter();

        $successRedirect = array(Configure::read('Routing') => true, 'controller' => 'dashboard', 'action' => 'index');
        $this->Auths->setSuccessRedirect( $successRedirect );


	}

	function index() {
		$administrators = $this->User->findAll();
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=>__("Administrator", true) ),

			),
		);
		$this->set('administrators', $administrators );
	}

    function login() {
    	$this->layout = 'login';
    }

    function logout() {
        $this->redirect( $this->Auths->logout() );
    }

}
?>