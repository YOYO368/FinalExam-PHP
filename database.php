<?php
	session_start();
	
	$host = "examapplicationphp-mysqldbserver.mysql.database.azure.com";
	$database = "dbFinalExam";
	$user = "yye2942@examapplicationphp-mysqldbserver";
	$password = "skatkwkd309^^";

	$connection = mysqli_connect($host, $user, $password, $database);
