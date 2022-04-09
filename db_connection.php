<?php

$db_conn = mysqli_connect("localhost", "your_db_root", "your_db_password", "your_db_name");
// Check connection
if($db_conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
error_reporting(E_ALL);
ini_set('display_errors','Off');

?>