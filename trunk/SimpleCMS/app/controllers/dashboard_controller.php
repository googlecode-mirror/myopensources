<?php
class DashboardController extends AppController {

	var $name = 'Dashboard';
	var $uses = array();
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'simple_layout';
		$this->pageTitle = __("System name", true);
	}
	
	
	function admin_index() {
		
	}
	
	function admin_top() {
		
	}

	function admin_left() {
	
	}
	
	function admin_main() {
		$this->layout = 'admin_default';
		
	}

	function admin_footer() {
		
	}
	
}
?>