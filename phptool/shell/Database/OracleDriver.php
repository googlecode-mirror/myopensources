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
									$this->colum2MysqlMapping($field, array_keys($constraints['primarys']) ) 
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

//		print_r($fields);
//		print_r($constraints);
//		print_r($indeies);
//		print_r($sql);
		
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
	
	private function colum2MysqlMapping($field, $primaries) {
		$type = $field['type'];
		$null_able = ($field['null_able'] == 'Y') ? "" : "NOT NULL";
		$default = ($field['default']) ? "DEFAULT {$field['default']}" : "";
		$auto_increment = "";
		switch ($type) {
			case 'NUMBER':
				$new_type = ( $field['length'] && ($field['length']> 0) ) ? "INT({$field['length']})" : "INT";
				if ( in_array($field['name'], $primaries) ) {
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
	
	
	
	
	
}
