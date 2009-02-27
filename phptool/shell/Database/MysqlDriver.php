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
		$this->setCharset($db_config['charset']);
	}
	
	protected function connect($db_config) {
		$conn = mysql_connect($db_config['host'], $db_config['user'], $db_config['passwod']);
		if (is_resource($conn)) {
			mysql_select_db($db_config['db'], $conn);
			return $conn;
		}else {
			print "Error!: " . mysql_error() . "\n";
			die();
		}
	}
	
	protected function query($sql) {
		$res = mysql_query($sql, $this->dbh);
		if ( !$res ) {
			return false;
		}
		return true;
	}
	
	public function fetchData($sql) {
		$result = null;
		$res = mysql_query($sql, $this->dbh) or die('Query failed: ' . mysql_error());
		while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
			$result[] = $row;
		}
		mysql_free_result($res);
		return $result;
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
		if (empty($result)) {
			return;
		}
		
		foreach ($result as $key=>$value){
			$tables[] = $value[ key($value) ];
		}
		return $tables;
	}
	
	public function getViews() {
		$schema = $this->db_config['db'];
		$sql = "SELECT TABLE_NAME as name
			FROM information_schema.tables
			WHERE table_schema = '{$schema}'
			AND table_type = 'view'
			";
		$views = array();
		$result = $this->fetchData($sql);
		
		if (empty($result)) {
			return;
		}
		
		foreach ($result as $key=>$value){
			$views[] = $value[ 'name'];
		}
		return $views;
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
	
	public function dropView($name ) {
		$sql = "DROP VIEW IF EXISTS {$name}";
		return $this->doQuery($sql);
	}
	
	function __destruct() {
		mysql_close($this->dbh);
	}
	
}
