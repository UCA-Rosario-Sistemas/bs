<?php
	include 'actions/conection.php';
	$query=mysql_query("SELECT category FROM categories");

?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<title>Cargar Base de Datos</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="container " style="max-width:300px;">
		<form class="form-signin" method="POST" action="actions/cargar.php" enctype="multipart/form-data">
			<h2 class="form-signin-heading">
				Cargar Datos				
			</h2>
			<div class="form-group">
				<label class="sr-only" for="inputNane">
					Nombre
				</label>

				<input id="inputName" name='name' class="form-control" type="text" autofocus required placeholder="Nombre del producto"></input>
			</div>
			<div class="form-group">
				<label class="sr-only" for="inputDescription">
					Descripcion
				</label>
				<textarea class="form-control" name='description' rows="3" placeholder="Descripcion del producto"></textarea>				
			</div>

			<!--<div class="form-group">
				<label class="sr-only" for="inputCategory">
					Categoria
				</label>

				<input list="products" name="products" placeholder="Categoria">
				<datalist id='products'>
					<?php
					while ($f=mysql_fetch_array($query)) {
						echo '<option value="'.$f['category'].'">';
					}

					?>
				</datalist>

			</div>-->

			<div class="form-group">
    				<label for="inputImg">Imagen</label>
    				<input type="file" id="inputImg" name='imagen'>
    				<p class="help-block">Imagen a subir</p>
 			</div>

			<div class="form-group">
				<label class="sr-only" for="inputPrice">
					Precio
				</label>


				<div class="input-group">
      				<div class="input-group-addon">$</div>
					<input id="inputPrice" name='price' class="form-control" type="number" min="1" max="100000" required placeholder="Precio del producto"></input>
					<!--<div class="input-group-addon">.00</div> -->
				</div>
			</div>
			
			<div class="form-group">
				<label class="sr-only" for="inputStock">
					Stock
				</label>
				
					<input id="inputStock" name='stock' class="form-control" type="number" min="1" max="1000" required placeholder="Stock del producto"></input>
					
			</div>
			

			<button class="btn btn-lg btn-primary btn-block" type="submit" >Agregar Producto</button>

		</form>

	</div>

</body>
</html>