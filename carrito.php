<?php

	session_start();
	include 'actions/conection.php';


	if (isset($_SESSION['cart'])) { 
		//Si Existe carrito, se ve si ya estaba agregado
		if (isset($_GET['id'])) {
			//Si no existe el GET, solo muestra
			
		
			$array=$_SESSION['cart'];
			$find=false;
			$number=0;

			for ($i=0; $i < count($array) ; $i++) { 
				if ($array[$i]['Id']==$_GET['id']) {
					// Si estaba agregado, incrementa la cantidad
					$find=true;
					$number=$i;
				}
			}

			if ($find == true) {
				$array[$number]['Cantidad']=$array[$number]['Cantidad']+1;
				$_SESSION['cart']=$array;
			}else{
				// Si no esta agregado
				// Se guarda el nuevo producto
				$name="";
				$description="";
				$price=0;
				$imagen="";
				$stock=0;

				$re=mysql_query("select * from productos where id=".$_GET['id']);
				while ($f=mysql_fetch_array($re)) {
					$name=$f['nombre'];
					$description=$f['descripcion'];
					$price=$f['precio'];
					$imagen=$f['imagen'];
					$stock=$f['stock'];

				}

				$newData=array('Id'=>$_GET['id'],
								'Nombre' => $name,
								'Descripcion' => $description,
								'Imagen' => $imagen,
								'Precio' => $price,
								'Stock' => $stock,
								'Cantidad' => 1	);
				array_push($array, $newData);

				$_SESSION['cart']=$array;
			}
		}

		
	}else{
		// Si no existe carrito, se agrega el producto
		if (isset($_GET['id'])) {
			$name="";
			$description="";
			$price=0;
			$imagen="";
			$stock=0;

			$re=mysql_query("select * from productos where id=".$_GET['id']);
			while ($f=mysql_fetch_array($re)) {
				$name=$f['nombre'];
				$description=$f['descripcion'];
				$price=$f['precio'];
				$imagen=$f['imagen'];
				$stock=$f['stock'];

			}

			$array[]=array('Id'=>$_GET['id'],
							'Nombre' => $name,
							'Descripcion' => $description,
							'Imagen' => $imagen,
							'Precio' => $price,
							'Stock' => $stock,
							'Cantidad' => 1	);

			$_SESSION['cart']=$array;

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
	
	 <h1 class="text-center"> Productos Seleccionados </h1>
	
	<container>

		<?php require('templates/menu.php'); ?>

			<?php
				$total=0;
				if (isset($_SESSION['cart'])) {
					$data=$_SESSION['cart'];
					

					for ($i=0; $i<count($data) ; $i++) { 
			?>
				<div class="column text-center"  >
				  	<div class="col-sm-6 col-md-3">
				    	<div class="thumbnail producto">
				      		<img src="<?php echo $data[$i]['Imagen']; ?>" style="height:172px; width: 190px;" alt="172x150">
				      		<div class="caption">
				        		<h3><?php echo $data[$i]['Nombre'];?> </h3>
				        		<p><?php echo $data[$i]['Descripcion'];   ?><br>
				        		Precio unitario: $<?php echo $data[$i]['Precio'] ; ?> <br>
				        		Stock: <?php echo $data[$i]['Stock'] ;    ?>
				        		</p>
				        		<span>Cantidad: 
				        			<input type="text" class="form-control cantidad" value="<?php echo $data[$i]['Cantidad']; ?>"
				        			data-precio="<?php echo $data[$i]['Precio']; ?>"
				        			data-id="<?php echo $data[$i]['Id']; ?>">

				        		</span>
				        		<strong class="subtotal">Subtotal: $<?php echo $data[$i]['Precio']*$data[$i]['Cantidad']; ?></strong>

				          	
				      		</div>
				    	</div>
				  	</div>
				</div>


			<?php
				$total=($data[$i]['Precio']*$data[$i]['Cantidad'])+$total;
					}
					
				}else{
					echo '<div class="alert alert-warning text-center" role="alert" style="margin: 0 auto; margin-left: 300px; margin-right:300px;">Carrito de compras vacio</div>';
				}

				


			?>
			
			<div class="text-center navbar-fixed-bottom" style="padding-bottom: 20px;">
				<h2 id="total" >Total: $ <?php echo $total ?></h2>


				<div>
					<?php if ($total != 0) {
						 echo '<a class="btn btn-primary btn-lg " href="actions/comprar.php" role="button">Comprar </a>';
					}?>
					
					<a class="btn btn-default btn-lg " href="productos.php" role="button">Volver al catálogo</a>
					<?php if ($total != 0) {
						echo '<a class="btn btn-danger btn-lg " href="actions/destroy.php" role="button"> Cancelar Compra </a>';
					}?>
				</div>
			</div>
	</container>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<?php require('templates/footer.php'); ?>