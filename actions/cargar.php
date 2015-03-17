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

		include 'actions/conection.php';

		$name= isset($_POST['nombre']) ? $_POST['nombre'] : '' ;
		$description= isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

		$price=$_POST['precio'];
		$stock=$_POST['stock'];

		$fullRoute="C:/xampp/htdocs/bs/img/productos/";

		$fileName=$fullRoute.$_FILES['imagen']['name'];

		$route='img/productos/'.$_FILES['imagen']['name'];

		$query="INSERT INTO productos (nombre,descripcion,imagen,stock,precio) VALUES ('$name','$description','$route','$stock','$price')";

		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fileName)){

		

	 ?>
	 			<div class="panel panel-primary " style="max-width:400px; margin: 0 auto;">
	 				<div class="panel-heading text-center"><h3>Producto cargado con exito!</h3></div>
  					<div class="panel-body">
  						<h3> Datos cargados: </h3>
			 			<div class="thumbnail text-center" style="max-width:400px;">
			 				<img src=<?php echo $route ?> style="height:170px; width: 200px;" alt="200x170">
				    		<div class="caption">
							<h3><?php echo $name; ?> </h3> 
							<p>	<?php echo $description; ?> <br> <br>
								Stock: <?php echo $stock; ?> <br>
								Precio: $ <?php echo $price; ?> <br>
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



