<?php  

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "db_inventaris";

	$db  = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

	include_once'proses.php';

	$proses = new Proses($db); 

?>