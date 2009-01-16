<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'test1234',
		'database' => 'dev_simple_cms',
		'prefix' => '',
		'encoding' => 'utf8',
	);
	
	var $test = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'test1234',
		'database' => 'test_simple_cms',
		'prefix' => '',
		'encoding' => 'utf8',
	);
	
}
?>