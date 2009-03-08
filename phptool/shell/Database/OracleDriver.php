<?php
require_once 'Abstract.php';
include_once 'Application/Config.php';

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
		
		while($row = oci_fetch_array($stid, OCI_ASSOC|OCI_RETURN_NULLS)) {
			$result[] = $row;
		}
		return $result;
	}
	
	public function getViews() {
		$sql = "
		  SELECT VIEW_NAME,TEXT
	      FROM USER_VIEWS
      	";
		$result = $this->fetchData($sql);
		if (is_array($result) && (count($result) > 0) ) {
			foreach ($result as $row) {
				$tables[] = $row;
			}
			return $tables;
		}
	}
	
	
	public function moveTableRecords($table_name, Database_Abstract $target_obj, $logger, $is_view=FALSE) {
		$mesg = "~~~~ Will be import table [{$table_name}] data ~~~~";
		print "{$mesg}\n";
		$logger->log($mesg);
		
		// populate fields string
		$mysql_date_format = "YYYY-MM-DD";
		$fields = $this->getFields($table_name);
		$field_list = "";
		$insert_field_list = "";
		$spliter = "";
		foreach ($fields as $key => $item){
			$field_name = $item['name'];
			$field_type = strtolower($item['type']);
			switch ($field_type) {
				case 'date':
					$field_name = "TO_CHAR({$item['name']}, '{$mysql_date_format}') as {$item['name']}";
					break;
				case 'int':
				case 'number':
					$field_name = "NVL({$item['name']}, 0 ) as {$item['name']}";
					break;
			}
			
			$field_list .= $spliter . $field_name;
			$insert_field_list .= $spliter . "`{$item['name']}`";
			$spliter = ",";
		}
		
		// populate order by sql
		$constraints = $this->getPrimaryForeignUniqueKeys($table_name);
		$order_by_sql = "";
		if ( count($constraints['primarys']) > 0 ) {
			$order_by_sql = " ORDER BY ";
			$spliter = "";
			foreach ($constraints['primarys'] as $key=>$values){
				$order_by_sql	.= $spliter . $key;
				$spliter 		 = ",";
			}
			$order_by_sql .= " ASC ";
		}
		//--- conver fields name to lower ---
		if ( Application_Config::getInstance()->toLower() ) {
			$field_list 		= strtolower( $field_list );
			$insert_field_list 	= strtolower( $insert_field_list );
			$order_by_sql 		= strtolower( $order_by_sql );
		}
		
		
		$sql = "SELECT {$field_list} FROM {$table_name} {$order_by_sql} ";
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
		$log_flag = FALSE;
		
		$table_name = $is_view ? $table_name . "S" : $table_name ;
		
		while($row = oci_fetch_array($stid, OCI_ASSOC|OCI_RETURN_NULLS|OCI_RETURN_LOBS)) {//|OCI_RETURN_LOBS
			$insert_sql = "INSERT INTO `{$table_name}` ({$insert_field_list}) VALUES (";
			$spliter = "";
			foreach ($row as $key=>$value){
				if ($value == "") {
					$field_value = 'NULL';
				}
				elseif (is_integer($value)){
					$field_value = $value;
				}
				else {
					$field_value ="'".mysql_escape_string($value)."'";
				}
				
				$insert_sql .= $spliter . "$field_value";
				$spliter 	 = ",";
			}
			$insert_sql .= ")";
			$result = "";
			if ( $target_obj->doQuery($insert_sql) ) {
				$result = "Done";
				$success +=1;
				$log_flag = FALSE;
			}else {
				$e_msg = 'Query failed: ' . mysql_error(). "\n SQL: {$insert_sql}\n";
				$result = "Fail -> {$e_msg}";
				$fail +=1;
				$log_flag = TRUE;
			}
			$first= array_shift($row);
			$mesg = "Import: ".print_r($first, true)." [{$result}].";
			print "{$mesg}\n";
			if (Application_Config::getInstance()->isLogginSuccess() || $log_flag ) {
				$logger->log($mesg);
			}
			
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
		$indeies = $this->getIndeies($table_name);
		$indeies_sql = "";
		if ( count($indeies) > 0 ) {
			foreach ($indeies as $key=>$values){
				$indeies_sql	.= sprintf(", INDEX `%s` (`%s`)\n", $key, implode("`,`", $values) );
			}
		}
		
		//--- conver fields name to lower ------- 
		if (Application_Config::getInstance()->toLower() ) {
			$colums_sql = strtolower($colums_sql);
			$primarys_sql = strtolower($primarys_sql);
			$uniques_sql = strtolower($uniques_sql);
			$indeies_sql = strtolower($indeies_sql);
		}
		

		$sql = <<<EOD
DROP TABLE IF EXISTS `{$table_name}`;
CREATE TABLE IF NOT EXISTS `{$table_name}` (
{$colums_sql}
{$primarys_sql} 
{$uniques_sql}
{$indeies_sql}
) ENGINE=MyISAM DEFAULT CHARSET=utf8;		
EOD;
		return $sql;
	}
	
	public function tableAsView() {
		$sql = <<<EOD
CREATE TABLE IF NOT EXISTS `MOBILE2GS` (
  `id` bigint(22) not null auto_increment,
  `brand` varchar(100),
  `brandid` integer,
  `phonetype` varchar(200),
  `phoneid` integer,
  `imagepath` text,
  `new` integer,
  primary key (`id`),
  index `mobile2gs_index` (`phoneid`, `brand`, `brandid`)
)ENGINE=MyISAM DEFAULT CHARSET = utf8;
 

CREATE TABLE IF NOT EXISTS `MOBILE3GS` (
  `id` bigint(22) not null auto_increment,
  `brand` varchar(100),
  `brandid` integer,
  `phonetype` varchar(200),
  `phoneid` integer,
  `imagepath` text,
  `new` integer,
  primary key (`id`),
  index `mobile3gs_index` (`phoneid`, `brand`, `brandid`)
)ENGINE=MyISAM DEFAULT CHARSET = utf8;
 

CREATE TABLE IF NOT EXISTS `MOBILEALLS` (
  `id` bigint(22) not null auto_increment,
  `brand` varchar(100),
  `brandid` integer,
  `phonetype` varchar(200),
  `phoneid` integer,
  `imagepath` text,
  `new` integer,
  primary key (`id`),
  index `mobilealls_index` (`phoneid`, `brand`, `brandid`)
)ENGINE=MyISAM DEFAULT CHARSET = utf8;
 
CREATE TABLE IF NOT EXISTS `MOBILEHSDPAS` (
  `id` bigint(22) not null auto_increment,
  `brand` varchar(100),
  `brandid` integer,
  `phonetype` varchar(200),
  `phoneid` integer,
  `imagepath` text,
  `new` integer,
  primary key (`id`),
  index `mobilehsdpas_index` (`phoneid`, `brand`, `brandid`)
)ENGINE=MyISAM DEFAULT CHARSET = utf8;
 
CREATE TABLE IF NOT EXISTS `MOBILEONSALES` (
  `id` bigint(22) not null auto_increment,
  `phoneid`  integer,
  `brand`  varchar(100),
  `brandid` integer,
  `phonetype` varchar(200),
  `status` integer,
  `seq` integer,
  `imagepath` text,
  `hot` integer,
  `new` integer,
  `no1` integer,
  `salerating` integer,
  `girl` integer,
  `senior` integer,
  `phoneintro` text,
  `providestatus` text,
  `entitylimit` text,
  primary key (`id`),
  index `mobileonsales_index` (`phoneid`, `brand`, `brandid`)
)ENGINE=MyISAM DEFAULT CHARSET = utf8;
 

CREATE TABLE IF NOT EXISTS `MOBILEPROMOTIONS` (
  `id` bigint(22) not null auto_increment,
  `phoneid` integer,
  `groupid` integer,
  `groupname` text,
  `name` varchar(100),
  `price` integer,
  `shortname` varchar(100),
  primary key (`id`),
  index `mobilepromotions_index` (`phoneid`, `groupid`)
)ENGINE=MyISAM DEFAULT CHARSET = utf8
		
EOD;
		return $sql;
	}
	
	
	private function colum2MysqlMapping($table_name, $field, $primaries) {
		$type = $field['type'];
		$null_able = ($field['null_able'] == 'Y') ? "" : "NOT NULL";
		$default = ($field['default']) ? "DEFAULT {$field['default']}" : "";
		$auto_increment = "";
		switch ($type) {
			case 'NUMBER':
				if ( ( $field['length'] && ($field['length']> 10) ) ) {
					$new_type = "BIGINT({$field['length']})";
				}
				else
					$new_type = ( $field['length'] && ($field['length']> 0) ) ? "INT({$field['length']})" : "INT";
				if ( in_array($field['name'], $primaries) && 
						(!in_array(strtolower($table_name), 
								array('mr_code_ratedatastatus', 
								'navigations',
								'navigation_visions',
								) 
							)
						) 
					) 
				{
					$default = "";
					$auto_increment = "AUTO_INCREMENT";
				}
				
				break;
				
			case 'VARCHAR2':
				$new_type = ($field['length']> 255) ? "text" : "VARCHAR({$field['length']})";
				$new_type = $this->specialFieldType($table_name, $field['name'], $new_type);
				if ( in_array($field['name'], $primaries) && $field['length']> 255 ) {
					$new_type = "VARCHAR(255)";
				}
								
				break;
				
			case 'CHAR':				
				$new_type = ($field['length']> 255) ? "text" : "{$type}({$field['length']})";
				$new_type = $this->specialFieldType($table_name, $field['name'], $new_type);
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
	
	private function specialFieldType($table, $field_name, $ori_type) {
		$new_type = $ori_type;
		switch ( strtolower($table) ) {
			case 'tulinanimations':
			case 'tulinpics':
			case 'tulinrings':
				if ( strtolower($field_name) == 'groupname' ) {
					$new_type = "VARCHAR(20)";
				}
				
				break;
				
			case 'smiles':
				if ( strtolower($field_name) == 'smiles' ) {
					$new_type = "VARCHAR(20)";
				}
				
				break;
			
				
		}
		return $new_type;
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
	
	function getIndeies($table_name) {
		$sql = "
		SELECT T.INDEX_NAME,T.COLUMN_NAME,I.INDEX_TYPE 
		FROM USER_IND_COLUMNS T,USER_INDEXES I 
		WHERE T.INDEX_NAME = I.INDEX_NAME AND T.TABLE_NAME = I.TABLE_NAME AND T.TABLE_NAME = UPPER('{$table_name}')
        ";
		$results = $this->fetchData($sql);
		$indeies = array();
		foreach ($results as $item){
			if (!eregi("PK_|_PK|SYS_|_KEY|PRIMARY_", $item['INDEX_NAME'] )) {
				$indeies[ $item['INDEX_NAME'] ][] = $item['COLUMN_NAME'];
			}
			
		}
		
		// --- back list ---------
		switch ( strtolower($table_name) ) {
			case 'games':
				unset($indeies['GAMES_INDEX1']);
				$indeies['GAMES_INDEX1'] = array('GROUPNAME', 'ORDERS');
				break;
			
			case 'mp_promotiongroup':
				unset($indeies['MP_PROMOTIONGROUP_INDEX1']);
				$indeies['MP_PROMOTIONGROUP_INDEX1'] = array('GROUPID', 'SEQ');
				break;
				
			case 'smiles':
				unset($indeies['SMILES_INDEX1']);
				$indeies['SMILES_INDEX1'] = array('SMILES', 'TIME');
				break;
			
			case 'tulinanimations':
				unset($indeies['TULINANIMATION_INDEX1']);
				$indeies['TULINANIMATION_INDEX1'] = array('GROUPNAME', 'ORDERS');
				break;
				
			case 'tulinpics':
				unset($indeies['TULINPIC_INDEX1']);
				$indeies['TULINPIC_INDEX1'] = array('GROUPNAME', 'ORDERS');
				break;
				
			case 'tulinrings':
				unset($indeies['TULINRING_INDEX1']);
				$indeies['TULINRING_INDEX1'] = array('GROUPNAME', 'ORDERS');
				break;
				
			case 'groupings':
				unset($indeies['GROUPS_LEVEL_ID']);
				$indeies['GROUPING_INDEX1'] = array('ID', 'LEVEL_ID', 'PARENT_ID');
				break;
				
			case 'navigation_visions':
				unset($indeies['UK_NAVIGATION_VISION_KEY']);
				$indeies['NAVIGATION_VISION_INDEX1'] = array('NAVIGATIONS_ID', 'ADENABLE', 'MARQUEEENABLE', 'MARQUEEMOTIONENABLE', 'ACTIVE');
				break;
				
				
		}
		
		return $indeies;
		
	}
	
	private function getFields($table_name) {
		$colums = array();
		$sql = "SELECT COLUMN_NAME, DATA_TYPE, DATA_LENGTH, NULLABLE, DATA_DEFAULT  
				FROM USER_TAB_COLUMNS 
				WHERE TABLE_NAME = UPPER('{$table_name}') ORDER BY column_id ASC ";
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
