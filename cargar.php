<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Datos cargados con exito!</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body>

	<?php

		include 'conexion.php';

		$nombre= isset($_POST['nombre']) ? $_POST['nombre'] : '' ;
		$descripcion= isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

		$precio=$_POST['precio'];
		$stock=$_POST['stock'];

		$fullRuta="C:/xampp/htdocs/bs/img/productos/";

		$nombreArchivo=$fullRuta.$_FILES['imagen']['name'];

		$ruta='img/productos/'.$_FILES['imagen']['name'];

		$query="INSERT INTO productos (nombre,descripcion,imagen,stock,precio) VALUES ('$nombre','$descripcion','$ruta','$stock','$precio')";

		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreArchivo)){

		

	 ?>
	 			<div class="panel panel-primary " style="max-width:400px; margin: 0 auto;">
	 				<div class="panel-heading text-center"><h3>Producto cargado con exito!</h3></div>
  					<div class="panel-body">
  						<h3> Datos cargados: </h3>
			 			<div class="thumbnail text-center" style="max-width:400px;">
			 				<img src=<?php echo $ruta ?> style="height:170px; width: 200px;" alt="200x170">
				    		<div class="caption">
							<h3><?php echo $nombre; ?> </h3> 
							<p>	<?php echo $descripcion; ?> <br> <br>
								Stock: <?php echo $stock; ?> <br>
								Precio: $ <?php echo $precio; ?> <br>
							</p>
							</div>

						</div>

					<div class="text-center"><a class="btn btn-primary btn-lg" href="cargar.html" role="button" >Cargar otro producto</a></div>
    					
  					</div>
  					<div class="panel-footer">Panel footer</div>
				</div>
			 	

				
	<?php
					

		}

	?>





	

</body>
</html>



