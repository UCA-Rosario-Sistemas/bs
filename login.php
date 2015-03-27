<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Log in - Hola Mundo</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body style="padding-top: 70px;" >

	<?php require ('templates/menu.php'); ?>

	<div class="container" style="max-width:300px;">

		<form id="login" method="POST" action="login/verify.php" class="form-signin">
			<h2 class="form-signin-heading">Por favor logeese</h2>

			<!--<label class="sr-only" for="inputEmail">
			Direccion Email
				
			</label> -->

			<input id="inputUser" name="User" class="form-control" type="email" autofocus required placeholder="Email adress"></input>

			<!--<label class="sr-only" for="inputPassword">
			Password				
			</label> -->

			<input id="inputPassword" name="Password" class="form-control" style="margin-top:10px;"  type="password" required placeholder="Password"></input>

			<button class="btn btn-lg btn-primary btn-block" style="margin-top:10px;" type="submit"> Sign In</button>
			



		</form>
		


	</div>


	<?php require ('templates/footer.php') ?>

