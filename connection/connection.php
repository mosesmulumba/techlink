<?php

	$servername = 'localhost';
	$hostname = 'root';
	$password = 'p@ss1234';
	// $db_name = 'pius';
	$db_name = 'malcom';


	$msg = '';
	$error = '';

	// $connection = new mysqli("localhost","root","","pius");

	$connection = mysqli_connect($servername , $hostname , $password, $db_name);

	if($connection){
		$msg = 'Successfully connected to the database';
	}else{
		
	}

?>