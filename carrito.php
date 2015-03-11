<?php

	session_start();
	include 'conexion.php';

	if (isset($_SESSION['carrito'])) { 
		//Si Existe carrito, se ve si ya estaba agregado
		if (isset($_GET['id'])) {
			//Si no existe el GET, solo muestra
			
		
			$arreglo=$_SESSION['carrito'];
			$encontro=false;
			$numero=0;

			for ($i=0; $i < count($arreglo) ; $i++) { 
				if ($arreglo[$i]['Id']==$_GET['id']) {
					// Si estaba agregado, incrementa la cantidad
					$encontro=true;
					$numero=$i;
				}
			}

			if ($encontro == true) {
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
				$_SESSION['carrito']=$arreglo;
			}else{
				// Si no esta agregado
				// Se guarda el nuevo producto
				$nombre="";
				$descripcion="";
				$precio=0;
				$imagen="";
				$stock=0;

				$re=mysql_query("select * from productos where id=".$_GET['id']);
				while ($f=mysql_fetch_array($re)) {
					$nombre=$f['nombre'];
					$descripcion=$f['descripcion'];
					$precio=$f['precio'];
					$imagen=$f['imagen'];
					$cantidad=$f['stock'];

				}

				$datosNuevos=array('Id'=>$_GET['id'],
								'Nombre' => $nombre,
								'Descripcion' => $descripcion,
								'Imagen' => $imagen,
								'Precio' => $precio,
								'Cantidad' => 1	);
				array_push($arreglo, $datosNuevos);

				$_SESSION['carrito']=$arreglo;
			}
		}

		
	}else{
		// Si no existe carrito, se agrega el producto
		if (isset($_GET['id'])) {
			$nombre="";
			$descripcion="";
			$precio=0;
			$imagen="";
			$stock=0;

			$re=mysql_query("select * from productos where id=".$_GET['id']);
			while ($f=mysql_fetch_array($re)) {
				$nombre=$f['nombre'];
				$descripcion=$f['descripcion'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
				$cantidad=$f['stock'];

			}

			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre' => $nombre,
							'Descripcion' => $descripcion,
							'Imagen' => $imagen,
							'Precio' => $precio,
							'Cantidad' => 1	);

			$_SESSION['carrito']=$arreglo;

		}
	}

	


	



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Carrito de compras - Hola Mundo</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	

</head>
<body style="padding-top: 50px;" >
	<container style="padding-top: 100px;">

<?php require('templates/menu.php'); ?>

	<?php
		$total=0;
		if (isset($_SESSION['carrito'])) {
			$datos=$_SESSION['carrito'];
			

			for ($i=0; $i<count($datos) ; $i++) { 
	?>
		<div class="column text-center"  >
		  	<div class="col-sm-6 col-md-3">
		    	<div class="thumbnail producto">
		      		<img src="<?php echo $datos[$i]['Imagen']; ?>" style="height:172px; width: 190px;" alt="172x150">
		      		<div class="caption">
		        		<h3><?php echo $datos[$i]['Nombre'];?> </h3>
		        		<p><?php echo $datos[$i]['Descripcion'];   ?><br>
		        		Precio unitario: $<?php echo $datos[$i]['Precio'] ?></p>
		        		<span>Cantidad: 
		        			<input type="text" class="form-control cantidad" value="<?php echo $datos[$i]['Cantidad']; ?>"
		        			data-precio="<?php echo $datos[$i]['Precio']; ?>"
		        			data-id="<?php echo $datos[$i]['Id']; ?>">

		        		</span>
		        		<strong class="subtotal">Subtotal: <?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad']; ?></strong>

		          	
		      		</div>
		    	</div>
		  	</div>
		</div>


	<?php
		$total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
			}
			
		}else{
			echo '<div class="alert alert-warning text-center" role="alert" style="margin: 0 auto; margin-left: 300px; margin-right:300px;">Carrito de compras vacio</div>';
		}

		


	?>
	</container>
	<div class="text-center fixed-bottom">
		<h2 id="total" >Total: $ <?php echo $total ?></h2>'


		<div><a class="btn btn-primary btn-lg static-bottom" href="productos.php" role="button">Volver al catálogo</a></div>
	</div>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<?php require('templates/footer.php'); ?>