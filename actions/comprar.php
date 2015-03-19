<?php
session_start();
include ('conection.php');
	
	$array=$_SESSION['cart'];
	$sellNumber=0;
	//Obtengo el sellnumber mayor
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
		//Completo tabla compras de a 1 producto
		mysql_query("INSERT into compras (numeroventa,nombre,precio,cantidad) VALUES (
			".$sellNumber.",
			'".$array[$i]['Nombre']."',
			'".$array[$i]['Precio']."',
			'".$array[$i]['Cantidad']."'
			)")or die(mysql_error());
		//Obtengo stock
		$re=mysql_query("SELECT * FROM productos where id='".$array[$i]['Id']."'")or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
			$stock=$f['stock'];
		}
		//Doy de baja stock
		mysql_query("UPDATE productos SET stock='".($stock-$array[$i]['Cantidad'])."' where id='".$array[$i]['Id']."'")or die(mysql_error());
	}
	//001 (reemplazar con numero cliente)

	unset($_SESSION['cart']);
	echo "<script> alert('Compra realizada con éxito, redirigiendo al catalogo') </script>";
	header('Location: ../productos.php');

	
	







?>