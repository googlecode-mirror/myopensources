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
		$this->set("menus", array(
			//-- article 
			__("Article", true) => array(
				array('label'=>__("Categories", true), 'url'=>"/admin/article_categories" ),
				array('label'=>__("Listing", true), 'url'=>"/admin/articles" ),
			),
			
			//-- Products 
			__("Products", true) => array(
				array('label'=>__("Categories", true), 'url'=>"/admin/article_categories" ),
				array('label'=>__("Listing", true), 'url'=>"/admin/articles" ),
			),
			
			//-- Products 
			__("Products", true) => array(
				array('label'=>__("Categories", true), 'url'=>"/admin/article_categories" ),
				array('label'=>__("Listing", true), 'url'=>"/admin/articles" ),
			),
			
			//-- WebMailler 
			__("WebMailler", true) => array(
			
				array('label'=>__("Templates", true), 'url'=>"/admin/webmailler/mail_templates" ),
				array('label'=>__("Customers", true), 'url'=>"/admin/webmailler/mail_customers" ),
				array('label'=>__("Cust Categories", true), 'url'=>"/admin/webmailler/mail_customer_categories" ),
				array('label'=>__("Mail Server", true), 'url'=>"/admin/webmailler/mail_servers" ),
			),
			
			//-- Finance 
			__("Finance", true) => array(
				array('label'=>__("Categories", true), 'url'=>"/admin/finance/finance_categories" ),
				array('label'=>__("Listing", true), 'url'=>"/admin/finance/financies" ),
			),
			
			//-- Users 
			__("Users", true) => array(
				array('label'=>__("Categories", true), 'url'=>"/admin/account/departments" ),
				array('label'=>__("Listing", true), 'url'=>"/admin/account/users" ),
			),
			
			
		));
	}
	
	function admin_main() {
		$this->layout = 'admin_default';
		
	}

	function admin_footer() {
		
	}
	
}
?>