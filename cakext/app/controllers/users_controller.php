<?php
class UsersController extends AppController {

	var $name = 'Users';


	function login() {
		if ($this->Auths->isAuthorized()) {
			$this->autoRender = false;
			echo "{success:true,msg:'OK'}";
			exit;
		}else if($this->Auths->authError && !empty($this->Auths->data)){
			$this->autoRender = false;
			echo "{success:true,msg:'{$this->Auths->authError}'}";
			exit;

		}

	}

    function logout() {
        $this->redirect( $this->Auths->logout() );
    }

}
?>