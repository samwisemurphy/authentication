<?php 
// Creating an array to store all of our settings in
return [
	'app' => [
		'url'=>'http://localhost',
		'hash'=> [
			'algo' => PASSWORD_BCRYPT,
			'cost' => 10
		]
	],

	// Using the Laravel database system

	'db' => [
		'driver' => 'mysql',
		'host' => 'localhost',
		'name' => 'site',
		'username' => 'root',
		'password' =>'root',
		'charset'=> 'utf8',
		'collation => ''utf8_unicode_ci',
		'prefix' => ''
	],

	'auth' => [
		'session' => 'user_id',
		'remeber' => 'user_r'
	],

	'mail' => [
		'smtp_auth' => true,
		'smtp_secure' => 'tls',
		'host' => 'smtp.gmail.com',
		'username' => 'spaulmurphy@gmail.com',
		'password' = 'golfrules',
		'port' => 587,
		'html' => true
	],

	'twig' => []
		'debug' => true
	],

	'csrf' => [
		'session' => 'csrf_token'
	]
];