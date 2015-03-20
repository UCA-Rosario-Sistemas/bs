<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Listado de productos - Hola Mundo</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body style="padding-top: 50px;">



	<div class="container">
      	<h2>Todos los productos</h2>
      	<p>Listdado de productos con o sin stock.</p>                                          
      	<table class="table table-striped table-bordered table-hover table-condensed">
        	<thead>
          		<tr>
	            	<th>ID producto</th>
	            	<th>Nombre</th>
	            	<th>Descripcion</th>
	            	<th>Precio</th>
	            	<th>Stock Actual</th>
	            	
          		</tr>
        	</thead>
        	<tbody>
	          <?php

	          include 'conection.php';

	          $re=mysql_query("SELECT * FROM productos ORDER BY id ASC ")or die(mysql_error());
	          
	          while ($f=mysql_fetch_array($re)) {
	          		
	          		?>

	          			<tr>
	          				<th><?php echo $f['id']; ?></th>
	          				<th><?php echo $f['nombre']; ?></th>
	          				<th><?php echo $f['descripcion']; ?></th>
	          				<th><?php echo "$ ".$f['precio']; ?></th>
	          				<th><?php echo $f['stock']; ?></th>
	          				
	          			</tr>


	          		<?php
	          }





	          ?>
	        </tbody>
      </table>
    </div>

</body>
</html>