<?php

class OauthAppController extends AppController {
	var $components = array('RequestHandler');
	
	function beforeFilter() {
	    $this->RequestHandler->setContent('json', 'text/x-json');
	}
	
}

?>