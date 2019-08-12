<?php
	session_start();
	
	$host = "finalappphp-mysqldbserver.mysql.database.azure.com";
	$database = "dbFinalExam";
	$user = "yye2942@finalappphp-mysqldbserver";
	$password = "skatkwkd309^^";

	$connection = mysqli_connect($host, $user, $password, $database);
