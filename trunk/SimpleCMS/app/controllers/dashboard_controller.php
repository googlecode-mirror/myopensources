<?php
class DashboardController extends AppController {

	var $name = 'Dashboard';
	var $uses = array();
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'simple_layout';
	}
	
	
	function admin_index() {

	}
	
	function admin_top() {
		
	}

	function admin_left() {
		
	}
	
	function admin_main() {
		
	}

	function admin_footer() {
		
	}
	
}
?>