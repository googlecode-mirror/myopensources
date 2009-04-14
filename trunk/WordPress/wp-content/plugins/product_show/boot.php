<?php
include_once 'model/product.php';
/*
Plugin Name: Product Show
Plugin URI: http://35vt.blogspot.com/
Description: This Plugin simply show product
Author: John.Meng
Version: 1.0
Author URI: http://35vt.blogspot.com/

*/

// thanks to ikool for this fix
define('WEB_BASE_URL', get_option('siteurl').'/wp-content/plugins/product_show' );

if (!class_exists("ProductShow_Boot")) {

	class ProductShow_Boot {
		
		var $plugin_name	= 'product_show';
		var $page_name 		= 'product_show/boot.php';
		
		var	$model;
		var $page_folder;
		
		function ProductShow_Boot() {
			$this->page_folder = dirname (__FILE__) .DIRECTORY_SEPARATOR. 'pages'. DIRECTORY_SEPARATOR;
			$this->model = new ProductShow_Model();
			$this->loadLanguage();
			$this->registerActions();
			
			
		}
		
		function registerActions() {
			add_action('admin_menu', array(&$this, 'populateMenu') );
			add_action('activate_' . $this->page_name, array(&$this, 'install'));
			add_action('deactivate_' . $this->page_name, array(&$this, 'uninstall'));
		}
		
		
		function populateMenu() {
			//--- add main menu --
			add_object_page(__('Products'), __('Products'), 1, 'product_list', array(&$this, 'pageProductList'), WEB_BASE_URL."/images/icon4.gif");
			//-- add sub menu --
			add_submenu_page('product_list', __('Add Products'), __('Add Products'), 1, 'add_product', array(&$this, 'pageAddProduct') );
		}
		
		function pageProductList() {
			echo "Product Listing";
		}
		
		function pageAddProduct() {
			
			add_meta_box( 'add_product', __( 'New Product'), array(&$this, 'renderNewProduct'), 'add_product', 'normal' );
			echo '<div id="poststuff">';
			do_meta_boxes('add_product','normal',null);
			echo '</div>';
		}
		
		function renderNewProduct() {
			include_once ($this->page_folder . 'add_product.php');
			
		}
		
		
		function loadLanguage() {
			load_plugin_textdomain('default','/wp-content/plugins/'.$this->plugin_name.'/langs');
		}
		
		function install() {
			$this->model->createTable();
		}
		
		function uninstall() {
			$this->model->dropTable();
		}
		
		
	}
	global $product_show_boot;
	$product_show_boot = new ProductShow_Boot();
}


