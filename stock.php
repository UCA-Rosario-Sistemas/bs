<?php
session_start();
include 'actions/conection.php';

	
	$id=filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	$stock=filter_input(INPUT_GET, 'stock', FILTER_VALIDATE_INT);

	
	//$re=mysql_query("UPDATE productos SET stock='".$stock."' WHERE id='".$id."'")or die(mysql_error());
	




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Actualizar Stock - Hola Mundo</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body style="padding-top: 50px;">
	<?php require('templates/menu.php')  ?>

		<div class="container" style="max-width: 300px;">

			<form class="form-signin" method="GET" action="stock.php">
				<h2 class="form-signin-heading">
					Actualizar Stock				
				</h2>

				<div class="form-group">
				<label class="sr-only" for="inputId">
					ID
				</label>

				<input id="inputId" name='id' class="form-control" type="number" autofocus="" required="" placeholder="ID de producto"></input>
				</div>

				<div class="form-group">
				<label class="sr-only" for="inputStock">
					Stock
				</label>

				<input id="inputStock" name='stock' class="form-control" type="number" required="" placeholder="Stock a agregar"></input>
				</div>

				<button class="btn btn-lg btn-primary btn-block" type="text" >Actualizar Stock</button>
				<button class="btn btn-lg btn-default btn-block" type="text" onclick="newWindow()" >Lista ID</button>
				<script>
					function newWindow() {
						window.open('actions/id.php');
					}
				</script>
			</form>
		</div>

		<div class="text-center" style="max-width:350px; margin: 0 auto; margin-top:10px;">

		<?php
		if (isset($id)) {
			$exist=mysql_num_rows(mysql_query("SELECT * from productos where id='".$id."'"));	
			if  ($exist != 0){
				$re=mysql_query("UPDATE productos SET stock='".$stock."' WHERE id='".$id."'")or die(mysql_error());
				echo '<div class="alert alert-success" role="alert">Datos Cargados correctamente</div>';
				
			}else{
				echo '<div class="alert alert-danger" role="alert">ID de producto inexistente</div>';			
			}
		}

		?>
		</div>



	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

	<?php require('templates/footer.php')  ?>


</body>
</html>
