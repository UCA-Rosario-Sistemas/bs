<?php
session_start();

include '../conexion.php';

$re=mysql_query("select * from users where User='".$_POST['User']."' and 
					Password='".$_POST['Password']."'")or die(mysql_error());



?>