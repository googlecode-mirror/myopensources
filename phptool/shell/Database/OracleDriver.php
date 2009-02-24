<?php
require_once 'Abstract.php';
/**
 *
 * File description
 *
 * @package    Core
 * @subpackage Core
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-24
 * @version 1.0.0 $id$
 */

class Database_OracleDriver extends Database_Abstract {
	
	public function getTables() {
		return $this->getUserTables();
	}
	
	private function getUserTables() {
		$tables = array();
		$sql = "SELECT table_name FROM user_tables";
		$stmt = $this->dbh->prepare($sql);
		try {
			$stmt->execute();
			while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
				$tables[] = $row['TABLE_NAME'];
				
			}
			return $tables;
		}catch (Exception $e){
		   print "Error!: " . $e->getMessage() . "\n";
		   die();
			
		}
		
		
	}
	
	public function getTableDesc($table_name) {
		$fields = $this->getFields($table_name);
		$constraints = $this->getPrimaryForeignUniqueKeys($table_name);
		$indeies = $this->getTableIndex($table_name);
		print_r($fields);
		print_r($constraints);
		print_r($indeies);
	}
	
	private function getTableIndex($table_name) {
		$sql = "
			SELECT UI.INDEX_TYPE, UI.UNIQUENESS, UIC.INDEX_NAME, UIC.TABLE_NAME, UIC.COLUMN_NAME, UIC.COLUMN_LENGTH
		      FROM USER_IND_COLUMNS UIC, USER_INDEXES UI
		      WHERE UI.TABLE_NAME=upper('{$table_name}') AND UI.INDEX_NAME NOT IN (SELECT DISTINCT CONSTRAINT_NAME FROM USER_CONSTRAINTS)
		        AND UI.INDEX_NAME=UIC.INDEX_NAME
		      ORDER BY TABLE_NAME, INDEX_NAME, COLUMN_POSITION
      		";
		return $this->fetchData($sql);
		
	}
	
	
	private function getPrimaryForeignUniqueKeys($table_name) {
		$sql = "
		SELECT C.CONSTRAINT_NAME, C.CONSTRAINT_TYPE, C.R_CONSTRAINT_NAME, C.DELETE_RULE,
          CC.COLUMN_NAME
        FROM USER_CONSTRAINTS C, USER_CONS_COLUMNS CC
        WHERE C.TABLE_NAME=upper('{$table_name}') AND C.CONSTRAINT_TYPE!='C'
          AND C.CONSTRAINT_NAME=CC.CONSTRAINT_NAME AND C.OWNER=CC.OWNER AND C.TABLE_NAME=CC.TABLE_NAME
        ORDER BY C.CONSTRAINT_TYPE, C.CONSTRAINT_NAME, CC.POSITION
        ";
		
		return $this->fetchData($sql);
	}
	
	
	private function getFields($table_name) {
		$colums = array();
		$sql = "SELECT COLUMN_NAME, DATA_TYPE, DATA_LENGTH, NULLABLE, DATA_DEFAULT  
				FROM USER_TAB_COLUMNS 
				WHERE TABLE_NAME = UPPER('{$table_name}') ";
		$stmt = $this->dbh->prepare($sql);
		try {
			$stmt->execute();
			while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
				$tmp_row = array(
					'name' 		=> $row['COLUMN_NAME'],
					'type' 		=> $row['DATA_TYPE'],
					'length' 	=> $row['DATA_LENGTH'],
					'null_able' => $row['NULLABLE'],
					'default' 	=> $row['DATA_DEFAULT'],
				);
				$colums[] = $tmp_row;
				
			}
			return $colums;
		}catch (Exception $e){
		   print "Error!: " . $e->getMessage() . "\n";
		   die();
			
		}
		
	}
	
	private function fetchData($sql) {
		$result = array();
		$stmt = $this->dbh->prepare($sql);
		try {
			$stmt->execute();
			while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
				$result[] = $row;
				
			}
			return $result;
		}catch (Exception $e){
		   print "Error!: " . $e->getMessage() . "\n";
		   die();
			
		}
	}
	
	
	
	
}
