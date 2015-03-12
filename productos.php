<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Productos - Hola Mundo</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body style="padding-top: 50px;" >

<?php require('templates/menu.php'); ?>

<h1 class="text-center"> Productos disponibles </h1>

<?php include 'conexion.php';
	$re=mysql_query("select * from productos")or die(mysql_error());

	while($f=mysql_fetch_array($re)){


	

?>

<div class="column"  >
  	<div class="col-sm-6 col-md-3">
    	<div class="thumbnail">
      		<img src="<?php echo $f['imagen']; ?>" style="height:172px; width: 190px;" alt="172x150">
      		<div class="caption">
        		<h3><?php echo $f['nombre'];?> </h3>
        		<p><?php echo $f['descripcion'];   ?></p>
          	<p>
              <a href="detalles.php?id=<?php echo $f['id'] ?>" class="btn btn-primary" role="button">Detalles</a>
              <a href="carrito.php?id=<?php echo $f['id']; ?>" class="btn btn-default" role="buttton"> Agregar al Carrito  </a>
            </p>
      		</div>
    	</div>
  	</div>
</div>

<?php 
	}
?>



<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<!--  <script type="text/javascript" src="js/script.js"></script> -->

<?php require('templates/footer.php'); ?>


        	

