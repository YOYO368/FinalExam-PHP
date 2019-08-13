<?php
	session_start();
	
	$host = "applicationphp-mysqldbserver.mysql.database.azure.com";
	$database = "dbFinalExam";
	$user = "yye2942@applicationphp-mysqldbserver";
	$password = "skatkwkd309^^";

	$connection = mysqli_connect($host, $user, $password, $database);
