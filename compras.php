<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Compras - Hola Mundo</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body style="padding-top: 50px;">

<?php require('templates/menu.php');  ?>

	<div class="container">
      	<h2>Compras realizadas por clientes</h2>
      	<p>Using all the table classes on one table:</p>                                          
      	<table class="table table-striped table-bordered table-hover table-condensed">
        	<thead>
          		<tr>
	            	<th>Numero de Venta</th>
	            	<th>Cliente</th>
	            	<th>Producto</th>
	            	<th>Precio</th>
	            	<th>Cantidad</th>
	            	<th>Subtotal</th>
          		</tr>
        	</thead>
        	<tbody>
	          <?php

	          include('conexion.php');

	          $re=mysql_query("SELECT * FROM compras ORDER BY numeroventa DESC ")or die(mysql_error());

	          while ($f=mysql_fetch_array($re)) {

	          		?>

	          			<tr>
	          				<th><?php echo $f['numeroventa']; ?></th>
	          				<th><?php echo $f['idcliente']; ?></th>
	          				<th><?php echo $f['nombre']; ?></th>
	          				<th><?php echo $f['precio']; ?></th>
	          				<th><?php echo $f['cantidad']; ?></th>
	          				<th><?php echo ($f['precio']*$f['cantidad']); ?></th>

	          			</tr>


	          		<?php



	          }





	          ?>
	        </tbody>
      </table>
    </div>


<?php require('templates/footer.php'); ?>

</body>
</html>