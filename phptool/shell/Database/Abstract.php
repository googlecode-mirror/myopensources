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
	
	protected function fetchData($sql) {
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

?>