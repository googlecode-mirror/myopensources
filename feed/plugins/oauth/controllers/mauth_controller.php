<?php
class MauthController extends AppController {

	var $name = 'Mauth';
    var $uses = array();
	
  	function register() {
  		$this->set('data', 'test');
  		$this->render('/elements/json');
  	}
}
?>