<?php

	$server="localhost";
	$username="nicolas";
	$password="159456";
	$db="carrito";
	$con=mysql_connect($server,$username,$password)or die("No se pudo conectar al servidor");
	$sbd=mysql_select_db($db,$con)or die("No encuentra la base de datos");


?>