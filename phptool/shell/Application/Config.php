<?php
class Application_Config {
	private static $instance;
	
	private function __construct() {
		
	}
	
	public static function getInstance() {
		if (empty(self::$instance)) {
			self::$instance = new Application_Config();
		}
		return self::$instance;
	}
	
	public function getConnections() {
		
		$test_db_config = array(
		
			'schema_1' => array(
				'source' => array('type'=>'oracle', 'host'=>'10.77.0.1', 'user'=>'schema_web', 'passwod'=>'test', 'db'=>'XE', 'charset'=>'utf8' ),
				'target' => array('type'=>'mysql', 'host'=>'10.77.0.2', 'user'=>'dev', 'passwod'=>'test', 'db'=>'schema_web_new', 'charset'=>'utf8' ),
			),
			
			'schema_2' => array(
				'source' => array('type'=>'oracle', 'host'=>'10.77.0.4', 'user'=>'schema_xhtml', 'passwod'=>'test', 'db'=>'XE', 'charset'=>'utf8' ),
				'target' => array('type'=>'mysql', 'host'=>'10.77.0.6', 'user'=>'dev', 'passwod'=>'test', 'db'=>'schema_xhtml_new', 'charset'=>'utf8' ),
			),
			
		);
		
		return $test_db_config;
		
	}
	
	public function isLogginSuccess() {
		return false;
	}
	
	
	
	
}

?>