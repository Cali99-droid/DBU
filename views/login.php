<?php 
print('
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/normalize.css">
    <title>Login</title>
</head>
<body>
	<main class="main__login">

      <div  class="contenido">
		<div class="contenido__titulo">
		
			<img class="contenido__imagen" src="public/img/Medicos.png" alt="Medicos">
		</div>
		
		<div class="entrada">
			<div class="header">
				<img class="img-unasam" src="public/img/escudoUNASAM.png" alt="">
				<h2 class="titulo ">Direccion de Bienestar Universitario</h2>
		    </div> 
			<h1 class="no-margin titulo--log">Bienvenido</h1>     
			<form action="" class="formulario" method = "POST">
				<div class="campo">
					<label for="user" class="campo__label">Usuario</label>
					<input class="campo__field" type="text" name="user" placeholder="Nombre de usuario" id="user" required>
				</div>

				<div class="campo">
					<label for="pass" class="campo__label">Contraseña</label>
					<input type="password" name="pass" id="pass"  class="campo__field" placeholder="Password" required></input>
				</div>

				<div class="campo">
					<input type="submit" value="Ingresar" class="boton boton--primario">
				</div>   
			</form>
		</div>
	</div>
		
	
');

if( isset($_GET['error']) ) {
	$template = '
	<div class="error">	
			<p class="no-margin">%s</p>
	</div>
	
	</main>
  </body>
</html>
	';

	printf($template, $_GET['error']);
}