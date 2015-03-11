<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Prueba Bootstrap</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="container " style="max-width:300px;">
		<form class="form-signin">
			<h2 class="form-signin-heading">
				Por favor logeese				
			</h2>
			<label class="sr-only" for="inputUser">
				Usuario
			</label>

			<input id="inputUser" class="form-control" type="text" autofocus="" required="" placeholder="Usuario"></input>

			<label class="sr-only" for="inputPassword">
				Password
			</label>

			<input id="inputPassword" class="form-control" type="password" required="" placeholder="Password"></input>

			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"></input>
					Recordarme
				</label>

			</div>

			<button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>

		</form>

	</div>
			
		

</body>
</html>