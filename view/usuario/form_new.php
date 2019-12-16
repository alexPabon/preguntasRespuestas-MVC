<!DOCTYPE html>
<html>
<head>
	<title>Nuevo usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
	<link rel="stylesheet" type="text/css" href="/css/templates.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/js/templates.js"></script>
</head>
<body>
	<?php
		Template::login($usuario);			
		Template::menu();
	?>
	<div class="contenido">		
		<div class="marco">
			<h2>Formulario para nuevo Usuario</h2>
			<form method="post" action="/user/store">
				<ul class="formularios">
					<li>					
						<label>Usuario: </label>
						<input class="entradas" type="text" name="user">			
					</li>
					<li>
						<label>Password: </label>
						<input class="entradas" type="text" name="password">
					</li>
					<li>
						<label>Nombre: </label>
						<input class="entradas" type="text" name="nombre">
					</li>
					<li>
						<label>Primer apellido: </label>
						<input class="entradas" type="text" name="apellido1">
					</li>
					<li>
						<label>Segundo Apellido: </label>
						<input class="entradas" type="text" name="apellido2">
					</li>
					<li>
						<label>Privilegio: </label>
						<input class="entradas" type="number" min="0" max="1000" name="privilegio" value="0">
					</li>
					<li>
						<label>Admin: </label>
						<input type="checkbox" name="administrador" value="1">
					</li>
					<li>
						<label>Email: </label>
						<input class="entradas" type="email" name="email">
					</li>
				</ul>

				<input type="submit" name="guardar" value="Registrar usuario">
			</form>
			<p><a class="opciones" href="/user/list">Volver al listado</a></p>
		</div>
	</div>
	<?PHP Template::footer($usuario);?>
</body>
</html>