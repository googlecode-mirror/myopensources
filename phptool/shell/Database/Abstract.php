<?php
abstract class Database_Abstract {
	protected $dbh = null;
	
	function __construct($db_config) {
		$this->dbh = $this->connect($db_config);
	}
	
	protected function connect($db_config) {
		$connect_type = strtolower( $db_config['type'] );
		if (empty($connect_type)) {
			return false;
		}
		
		$host 		= $db_config['host'];
		$user 		= $db_config['user'];
		$passwod 	= $db_config['passwod'];
		$db 		= $db_config['db'];
		$charset 		= $db_config['charset'];
		
		switch ($connect_type){
			case 'mysql':
				$dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
				break;
			case 'oracle':
				$dsn = "oci:dbname=//{$host}:1521/{$db};charset={$charset}";
				break;
				
		}
		
		try {
		   $dbh = new PDO($dsn, $user, $passwod);
		   return $dbh;
		} catch (PDOException $e) {
		   print "Error!: " . $e->getMessage() . "\n";
		   die();
		}
	
	}
	
	public function fetchData($sql) {
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
	
	public function moveTableRecords($table_name, Database_Abstract $target_obj, $logger) {
		$mesg = "~~~~ Will be import table [{$table_name}] data ~~~~";
		print "{$mesg}\n";
		$logger->log($mesg);
		$sql = "SELECT * FROM {$table_name}";
		$stmt = $this->dbh->prepare($sql);
		try {
			$stmt->execute();
			$i = 0;
			$success = 0;
			$fail = 0;
			while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
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
			
		}catch (Exception $e){
		   print "Error!: " . $e->getMessage() . "\n";
		   die();
			
		}
	}
	
	public function doQuery($sql) {
		$sql = trim($sql);
		if ( !empty($sql) ) {
			try {
				$this->dbh->exec($sql);
				$error_code = $this->dbh->errorCode();
				if ($error_code != "00000") {
					return false;
				}
				
				return true;
				
			}catch (Exception $e){
			   print "Error!: " . $e->getMessage() . "\n";
			   return false;
				
			}
		}
		return true;
		
	}
	
	
}

?>