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

class Database_OracleDriver extends Database_Abstract {
	
	protected function connect($db_config) {
		$conn = oci_connect($db_config['user'], $db_config['passwod'], "//{$db_config['host']}/{$db_config['db']}", $db_config['charset']);
		if (is_resource($conn)) {
			return $conn;
		}else {
			$e = oci_error();
			print "Error!: " . $e['message'] . "\n";
			die();
		}
	}
	
	protected function query($sql) {
		$stid = oci_parse ($this->dbh, $sql);
		oci_execute($stid, OCI_DEFAULT);
		
	}
	
	public function fetchData($sql) {
		$result = array();
		
		$stid = oci_parse($this->dbh, $sql);
		if (!$stid) {
		  $e = oci_error($this->dbh);
		  print $e['message']."\n";
		  exit;
		}
		
		$r = oci_execute($stid, OCI_DEFAULT);
		if(!$r) {
		  $e = oci_error($stid);
		  echo $e['message']."\n";
		  exit;
		}
		
		while($row = oci_fetch_array($stid, OCI_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}
	
	public function moveTableRecords($table_name, Database_Abstract $target_obj, $logger) {
		$mesg = "~~~~ Will be import table [{$table_name}] data ~~~~";
		print "{$mesg}\n";
		$logger->log($mesg);
		$sql = "SELECT * FROM {$table_name}";
		$stid = oci_parse($this->dbh, $sql);
		if (!$stid) {
		  $e = oci_error($this->dbh);
		  print $e['message']."\n";
		  exit;
		}
		
		$r = oci_execute($stid, OCI_DEFAULT);
		if(!$r) {
		  $e = oci_error($stid);
		  echo $e['message']."\n";
		  exit;
		}
		
		$i = 0;
		$success = 0;
		$fail = 0;
		while($row = oci_fetch_array($stid, OCI_ASSOC|OCI_RETURN_NULLS|OCI_RETURN_LOBS)) {//|OCI_RETURN_LOBS
			$insert_sql = "INSERT INTO `{$table_name}` VALUES (";
			$spliter = "";
			foreach ($row as $key=>$value){
				$field_value = is_integer($value) ? $value : "'".mysql_escape_string($value)."'";
				$insert_sql .= $spliter . "$field_value";
				$spliter 	 = ",";
			}
			$insert_sql .= ")";
			$result = "";
			if ( $target_obj->doQuery($insert_sql) ) {
				$result = "Done";
				$success +=1;
			}else {
				$result = "Fail";
				$fail +=1;
			}
			$first= array_shift($row);
			$mesg = "Import: ".print_r($first, true)." [{$result}].";
			print "{$mesg}\n";
			$logger->log($mesg);
			$i++;
		}
		
		$mesg = "~~~~ Total: [{$i}]. Success: [{$success}]. Fail: [{$fail}] ~~~~";
		print "{$mesg}\n";
		$logger->log($mesg);
			
	}
	
	
	public function getTables() {
		return $this->getUserTables();
	}
	
	private function getUserTables() {
		$tables = array();
		$sql = "SELECT table_name FROM user_tables";
		$result = $this->fetchData($sql);
		if (is_array($result) && (count($result) > 0) ) {
			foreach ($result as $row) {
				$tables[] = $row['TABLE_NAME'];
			}
			return $tables;
		}
		
	}
	
	public function toMysqlScript($table_name) {

		$fields = $this->getFields($table_name);
		$constraints = $this->getPrimaryForeignUniqueKeys($table_name);
		$indeies = $this->getTableIndex($table_name);
		
		//-- fields
		$spliter = "";
		$colums_sql = "";
		foreach ($fields as $field){
			$colums_sql .= sprintf("\t%s %s \n", 
									$spliter, 
									$this->colum2MysqlMapping($table_name, $field, array_keys($constraints['primarys']) ) 
							);
			$spliter = ",";
		}
		
		//-- primary
		$primarys_sql = "";
		if ( count($constraints['primarys']) > 0 ) {
			$primarys_sql = "\t,PRIMARY KEY (";
			$spliter = "";
			foreach ($constraints['primarys'] as $key=>$values){
				$primarys_sql	.= $spliter . "`{$key}`";
				$spliter 		 = ",";
			}
			$primarys_sql .= ")\n";
		}
		
		//-- uniques
		$uniques_sql = "";
		if ( count($constraints['uniques']) > 0 ) {
			foreach ($constraints['uniques'] as $key=>$values){
				$uniques_sql	.= sprintf(", UNIQUE KEY `%s` (`%s`)\n", $values['CONSTRAINT_NAME'], $key );
			}
		}
		
		//-- indeies
		$indeies_sql = "";
		if ( count($constraints['indeies']) > 0 ) {
			foreach ($constraints['indeies'] as $key=>$values){
				$indeies_sql	.= sprintf(", KEY `%s` (`%s`)\n", $values['CONSTRAINT_NAME'], $key );
			}
		}

		return <<<EOD
DROP TABLE IF EXISTS `{$table_name}`;
CREATE TABLE IF NOT EXISTS `{$table_name}` (
{$colums_sql}
{$primarys_sql} 
{$uniques_sql}
{$indeies_sql}
) ENGINE=MyISAM DEFAULT CHARSET=utf8;		
EOD;
		
	}
	
	private function colum2MysqlMapping($table_name, $field, $primaries) {
		$type = $field['type'];
		$null_able = ($field['null_able'] == 'Y') ? "" : "NOT NULL";
		$default = ($field['default']) ? "DEFAULT {$field['default']}" : "";
		$auto_increment = "";
		switch ($type) {
			case 'NUMBER':
				$new_type = ( $field['length'] && ($field['length']> 0) ) ? "INT({$field['length']})" : "INT";
				if ( in_array($field['name'], $primaries) && (!in_array(strtolower($table_name), array('mr_code_ratedatastatus') )) ) {
					$default = "";
					$auto_increment = "AUTO_INCREMENT";
				}
				
				break;
				
			case 'VARCHAR2':
				$new_type = ($field['length']> 255) ? "text" : "VARCHAR({$field['length']})";
				if ( in_array($field['name'], $primaries) && $field['length']> 255 ) {
					$new_type = "VARCHAR(255)";
				}
								
				break;
				
			case 'CHAR':				
				$new_type = ($field['length']> 255) ? "text" : "{$type}({$field['length']})";
				break;
				
			case 'CLOB':				
				$new_type = "longtext";
				break;
				
			case 'DATE':				
				$new_type = "{$type}";
				break;
				
			default:				
				$new_type = ( $field['length'] && ($field['length']> 0) ) ? "{$type}({$field['length']})" : "{$type}";
				break;
				
				
		}
		
		if ($new_type == "text"){
			$null_able = $default = $auto_increment = "";
		}
		
		return sprintf("`%s` %s %s %s %s", $field['name'], $new_type, $null_able, $default, $auto_increment);
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
		
        $primarys = array();
        $foreigns = array();
        $uniques = array();
        
		$constraints = $this->fetchData($sql);
		foreach ($constraints as $item){
			$type = $item['CONSTRAINT_TYPE'];
			switch ($type) {
				case 'P':
					$primarys[ $item['COLUMN_NAME'] ] = $item;
					break;
					
				case 'U':
					$uniques[ $item['COLUMN_NAME'] ] = $item;
					break;
					
				case 'R':
					$foreigns[ $item['COLUMN_NAME'] ] = $item;
					break;
					
				default:
					break;
			}
			
		}
		
		return array(
			'primarys' => $primarys,
			'uniques' => $uniques,
			'foreigns' => $foreigns,
		);
	}
	
	
	private function getFields($table_name) {
		$colums = array();
		$sql = "SELECT COLUMN_NAME, DATA_TYPE, DATA_LENGTH, NULLABLE, DATA_DEFAULT  
				FROM USER_TAB_COLUMNS 
				WHERE TABLE_NAME = UPPER('{$table_name}') ";
		$result = $this->fetchData($sql);
		if (is_array($result) && (count($result) > 0) ) {
			foreach ($result as $row) {
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
		}
	}
	
	function __destruct() {
		oci_close($this->dbh);
	}
	
	
}
