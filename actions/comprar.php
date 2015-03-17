<?php
session_start();
include ('conection.php');
	
	$array=$_SESSION['cart'];
	$sellNumber=0;

	$re=mysql_query("SELECT * FROM compras ORDER BY numeroventa DESC limit 1")or die(mysql_error());

	while ($f=mysql_fetch_array($re)) {
		$sellNumber=$f['numeroventa'];
	}
	if ($sellNumber == 0) {
		$sellNumber=1;
	}else{
		$sellNumber++;
	}

	for ($i=0; $i < count($array) ; $i++) { 
		mysql_query("INSERT into compras (numeroventa,nombre,precio,cantidad) VALUES (
			".$sellNumber.",
			'".$array[$i]['Nombre']."',
			'".$array[$i]['Precio']."',
			'".$array[$i]['Cantidad']."'
			)")or die(mysql_error());
	}
	//001 (reemplazar con numero cliente)

	unset($_SESSION['cart']);
	header('../productos.php');

	echo "<script> alert('Compra realizada con éxito, redirigiendo al catalogo') </script>";

	







?>