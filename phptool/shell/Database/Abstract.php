<?php
abstract class Database_Abstract {
	protected $dbh = null;
	
	function __construct($db_config) {
		$this->dbh = $this->connect($db_config);
	}
	
	protected abstract function connect($db_config);
	protected abstract function query($sql);
	public abstract function fetchData($sql);
	
	
	public function doQuery($sql) {
		$sql = trim($sql);
		if ( !empty($sql) ) {
			try {
				
				if ($this->query($sql)) {
					return true;
				}
				
				return false;
				
			}catch (Exception $e){
			   print "Error!: " . $e->getMessage() . "\n";
			   return false;
				
			}
		}
		return true;
		
	}
	
	
}

?>