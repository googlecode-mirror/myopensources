<?php
require_once 'Abstract.php';

/**
 *
 * File description
 *
 * @package    Database
 * @subpackage Driver
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-24
 * @version 1.0.0 $id$
 */

class Database_MysqlDriver extends Database_Abstract  {
	
	function __construct($db_config) {
		parent::__construct($db_config);
		$this->setCharset('UTF8');
	}
	
	public function execMulti($sql) {
		$queries = explode(";", $sql);
		$success = true;
		foreach ($queries as $query	){
			$success = $this->doQuery($query);
		}
		return $success;
	}
	
	public function getTables() {
		$sql = "SHOW TABLES";
		$tables = array();
		$result = $this->fetchData($sql);
		foreach ($result as $key=>$value){
			$tables[] = $value[ key($value) ];
		}
		return $tables;
	}
	
	public function setCharset($charset='UTF8') {
		$sql = "SET NAMES {$charset}";
		$this->doQuery($sql);
	}
	
	public function truncateTable($table_name ) {
		$sql = "TRUNCATE TABLE {$table_name}";
		return $this->doQuery($sql);
	}	
	
	public function dropTable($table_name ) {
		$sql = "DROP TABLE {$table_name}";
		return $this->doQuery($sql);
	}	
	
}
