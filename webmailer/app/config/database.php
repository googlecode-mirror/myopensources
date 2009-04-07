<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'webmkailer',
		'prefix' => '',
		'encoding' => 'utf8',
	);
	
	var $test = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'test_webmkailer',
		'prefix' => '',
		'encoding' => 'utf8',
	);
	
}
?>