<?php
class DashboardController extends AppController {

	var $name = 'Dashboard';
	var $uses = array();
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'simple_layout';
		$this->pageTitle = __("System Name", true);
	}
	
	
	function index() {
		
	}
	
	function top() {
		
	}

	function left() {
		$this->set("menus", array(
			
			//-- WebMailler 
			__("WebMailler", true) => array(
			
				array('label'=>__("Templates", true), 'url'=>"/admin/webmailler/mail_templates" ),
				array('label'=>__("Sent Log", true), 'url'=>"/admin/webmailler/mail_logs" ),
				array('label'=>__("Customers", true), 'url'=>"/admin/webmailler/mail_customers" ),
				array('label'=>__("Cust Categories", true), 'url'=>"/admin/webmailler/mail_customer_categories" ),
				array('label'=>__("Mail Server", true), 'url'=>"/admin/webmailler/mail_servers" ),
				
			),
			
			
		));
	}
	
	function main() {
		$this->layout = 'default';
		
	}

	function footer() {
		
	}
	
}
?>