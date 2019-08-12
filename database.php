<?php
	session_start();
	
	$host = "localhost";
	$database = "dbfinalexam";
	$user = "root";
	$password = "";

	$connection = mysqli_connect($host, $user, $password, $database);
