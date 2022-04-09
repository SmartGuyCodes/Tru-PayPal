<?php
	require 'vendor/autoload.php';

	//Enable dotenv
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();

	// Database settings. Change these for your database configuration.
	$dbConfig = [
	    'host' => $_ENV['DB_HOST'],//'localhost',
	    'username' => $_ENV['DB_USERNAME'],//'root',
	    'password' => $_ENV['DB_PASSWORD'],//'',
	    'name' => $_ENV['DB_DATABASE'],//''
	];

	// $db_conn = mysqli_connect("localhost", "your_db_root", "your_db_password", "your_db_name");
	$db_conn = mysqli_connect($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);
	
	// Check connection
	if($db_conn === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	error_reporting(E_ALL);
	ini_set('display_errors','Off');