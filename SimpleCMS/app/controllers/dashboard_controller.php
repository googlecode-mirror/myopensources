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
//		$html->css( array("red-treeview"));
	}
	
	function admin_main() {
		$this->layout = 'admin_default';
		
	}

	function admin_footer() {
		
	}
	
}
?>