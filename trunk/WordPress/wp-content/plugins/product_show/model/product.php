<?php
/**
 *
 * File description
 *
 * @package    Core
 * @subpackage Core
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-4-14
 * @version 1.0.0 $id$
 */
class ProductShow_Model {
	
	var $table_name = 'products';
	
	function createTable() {
		$table = $this->getFullTableName();
	    $structure = "
			CREATE TABLE IF NOT EXISTS `{$table}` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `product_categories_id` int(11) NOT NULL DEFAULT '0',
			  `title` varchar(120) NOT NULL,
			  `contents` text NOT NULL,
			  `photo` varchar(100) DEFAULT NULL,
			  `created` int(11) DEFAULT NULL,
			  `modified` int(11) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;	    
	    ";
		$this->execute($structure);
	}
	
	function dropTable() {
		
		$table = $this->getFullTableName();
		$sql = "DROP TABLE IF EXISTS `{$table}`;";
		$this->execute($sql);
	}
	
	function execute($sql = "") {
		global $wpdb;
		if ($sql) {
			return $wpdb->query($sql);
		}
		
	}
	
	
	function getFullTableName() {
		global $wpdb;
	    return $wpdb->prefix . $this->table_name;
		
	}
	
	
	
}
