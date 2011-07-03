<?php
class AppController extends Controller {
	
	var $helpers = array('Javascript');
	var $components = array('RequestHandler');
	
	function beforeFilter() {
	    $this->RequestHandler->setContent('json', 'text/x-json');
	}
}