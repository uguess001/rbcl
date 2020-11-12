<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		$active_group = 'default';
		$query_builder = true;
		$dbhost = 'localhost';
		$db['default'] = array(
			'dsn'	=> 'mysql:host=' . $dbhost . ';dbname=rbcl_website',
			'hostname' => $dbhost,
			'username' => 'root',
			'password' => '',
			'database' => 'rbcl_website', 
			'dbdriver' => 'mysqli',
			'dbprefix' => '',
			'pconnect' => true,
			'db_debug' => true,
			'cache_on' => false,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => false,
			'compress' => false,
			'stricton' => false,
			'failover' => array(),
			'save_queries' => true
		);

/*defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = true;
$dbhost = 'localhost';
$db['default'] = array(
	'dsn'	=> 'mysql:host=' . $dbhost . ';dbname=cstravel_main',
	'hostname' => $dbhost,
	'username' => 'cstravel_db',
	'password' => 'admin@123',
	'database' => 'cstravel_main', 
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => true,
	'db_debug' => true,
	'cache_on' => false,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => false,
	'compress' => false,
	'stricton' => false,
	'failover' => array(),
	'save_queries' => true
);*/