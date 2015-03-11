<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalles</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body>
	<section>
	<?php
		include 'conexion.php';
		$re=mysql_query("SELECT * FROM productos where id=".$_GET['id'])or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
			
		

	?>

			<div class="panel panel-primary" style="margin: 0 auto; max-width:400px;">
				<div class="panel-heading text-center"><h3>Producto:</h3></div>
  				<div class="panel-body">
    				<div class="thumbnail text-center" style="max-width:350px;">
			 			<img src=<?php echo $f['imagen'] ?> style="height:200px; width: 200px;" alt="200x200">
				    	<div class="caption">
							<h3><?php echo $f['nombre']; ?> </h3> <br>
							<p>	<?php echo $f['descripcion']; ?> <br>
								<strong>Stock:</strong> <?php echo $f['stock']; ?> <br>
								<strong>Precio:</strong> $ <?php echo $f['precio']; ?> <br>
							</p>
							
						</div>
						<a href="carrito.php?id=<?php echo $f['id']; ?>" class="btn btn-primary">Añadir al Carrito de compras</a>
						<a href="productos.php" class="btn btn-default"> Volver </a>
					</div>

				</div>
  				
  				<div class="panel-footer">Panel footer</div>
			</div> <!-- Fin del Panel -->
			

	<?php

	}

	?>
	</section>



</body>
</html>