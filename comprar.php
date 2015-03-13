<?php
session_start();
include ('conexion.php');
	
	$arreglo=$_SESSION['carrito'];
	$numeroventa=0;

	$re=mysql_query("SELECT * FROM compras ORDER BY numeroventa DESC limit 1")or die(mysql_error());

	while ($f=mysql_fetch_array($re)) {
		$numeroventa=$f['numeroventa'];
	}
	if ($numeroventa == 0) {
		$numeroventa=1;
	}else{
		$numeroventa++;
	}

	for ($i=0; $i < count($arreglo) ; $i++) { 
		mysql_query("INSERT into compras (numeroventa,nombre,precio,cantidad) VALUES (
			".$numeroventa.",
			".$arreglo[$i]['Nombre'].", 
			".$arreglo[$i]['Precio'].",
			".$arreglo[$i]['Cantidad']."
			)")or die(mysql_error());
	}
	//001 (reemplazar con numero cliente)

	unset($_SESSION['carrito']);

	echo "<script> alert('Compra realizada con éxito, redirigiendo al catalogo') </script>";

	header('productos.php');






?>