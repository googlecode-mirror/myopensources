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
	
	private function doQuery($sql) {
		if ( !empty($sql) ) {
			try {
				$this->dbh->exec($sql);
				return true;
			}catch (Exception $e){
			   print "Error!: " . $e->getMessage() . "\n";
			   return false;
				
			}
		}
		
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
		return $this->fetchData($sql);
	}
	
}
