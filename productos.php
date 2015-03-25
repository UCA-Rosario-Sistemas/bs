<?php


?>
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
<form method="GET" action="productos.php">
  <div class="row " style="max-width: 600px; margin: 0 auto; padding-bottom: 10px;">
      <div class="">
        <div class="input-group">
          <input name="search" type="text" class="form-control" placeholder="Búsqueda de productos">
          <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Buscar!</button>
          </span>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
  </div><!-- /.row -->
</form>

<?php include 'actions/conection.php';

if (isset($_GET['search'])) {

  $re=mysql_query("SELECT * FROM productos WHERE nombre LIKE '%".$_GET['search']."%' OR descripcion LIKE '%".$_GET['search']."%'  ")or die(mysql_error());
  while ($f=mysql_fetch_array($re)) {
      ?>



            <div class="column"  >
                <div class="col-sm-6 col-md-3">
                  <div class="thumbnail">
                      <img src="<?php echo $f['imagen']; ?>" style="height:172px; width: 190px;" alt="172x150">
                      <div class="caption">
                        <h3><?php echo $f['nombre'];?> </h3>
                        <p class="text-center"><?php echo $f['descripcion'];   ?><br>
                        <strong>Stock: </strong><?php echo $f['stock']; ?></p>
                        <p class="text-center">
                          <a href="detalles.php?id=<?php echo $f['id'] ?>" class="btn btn-primary text-center" role="button">Detalles</a>
                          
                        </p>
                      </div>
                  </div>
                </div>
            </div>

            <h3><a class="navbar-fixed-bottom text-center" class="padding-bottom:40px;" href="productos.php"> Eliminar filtros</a></h3>
      <?php
    }  
}else{
	$re=mysql_query("SELECT * FROM productos WHERE stock > 0")or die(mysql_error());

	while($f=mysql_fetch_array($re)){


	

?>



<div class="column"  >
  	<div class="col-sm-6 col-md-3">
    	<div class="thumbnail">
      		<img src="<?php echo $f['imagen']; ?>" style="height:172px; width: 190px;" alt="172x150">
      		<div class="caption">
        		<h3><?php echo $f['nombre'];?> </h3>
        		<p class="text-center"><?php echo $f['descripcion'];   ?><br>
            <strong>Stock: </strong><?php echo $f['stock']; ?></p>
          	<p class="text-center">
              <a href="detalles.php?id=<?php echo $f['id'] ?>" class="btn btn-primary text-center" role="button">Detalles</a>
              
            </p>
      		</div>
    	</div>
  	</div>
</div>


<?php 
	   }
  }
?>




<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<!--  <script type="text/javascript" src="js/script.js"></script> -->

<?php require('templates/footer.php'); ?>


        	

