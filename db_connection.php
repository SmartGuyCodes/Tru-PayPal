<?php

	$db_conn = mysqli_connect("localhost", "root", "password", "trucomm_pay");
	// Check connection
	if($db_conn === false){
	    die("DB ERROR: Could not connect. " . mysqli_connect_error());
	}
	error_reporting(E_ALL);
	ini_set('display_errors','Off');

?>