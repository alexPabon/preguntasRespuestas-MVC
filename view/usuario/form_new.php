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
	<script type="text/javascript" src="/js/validarFormulario.js"></script>
</head>
<body>
	<?php
		Template::login($usuario);			
		Template::menu();
	?>
	<div class="contenido">		
		<div class="marco">
			<h2>Formulario para nuevo Usuario</h2>
			<form id="formRegistro" method="post" action="/user/store">
				<ul class="formularios">
					<li>					
						<label for="user">Usuario: </label>
						<input id="user" class="entradas" type="text" name="user">			
					</li>
					<li>
						<label for="pass">Contraseña: </label>
						<input id="pass" class="entradas" type="password" name="password">
					</li>
					<li>
						<label for="rpass">Repetir Contraseña: </label>
						<input class="entradas" id="rpass" type="password">
						<p id="msnPass"></p>
					</li>
					<li>
						<label for="regNombre">Nombre: </label>
						<input id="regNombre" class="entradas" type="text" name="nombre">
					</li>
					<li>
						<label for="apellido1">Primer apellido: </label>
						<input id="apellido1" class="entradas" type="text" name="apellido1">
					</li>
					<li>
						<label for="apellido2">Segundo Apellido: </label>
						<input id="apellido2" class="entradas" type="text" name="apellido2">
					</li>
					<li>
						<label for="privilegio">Privilegio: </label>
						<input id="privilegio" class="entradas" type="number" min="0" max="1000" name="privilegio" value="0">
					</li>
					<li>
						<label for="administrador">Admin: </label>
						<input id="administrador" type="checkbox" name="administrador" value="1">
					</li>
					<li>
						<label for="regEmail">Email: </label>
						<input id="regEmail" class="entradas" type="email" name="email">
					</li>
				</ul>

				<input type="submit" name="guardar" value="Registrar usuario">
			</form>
			<p id="msnError"></p>
			<p><a class="opciones" href="/user/list">Volver al listado</a></p>
		</div>
	</div>
	<?PHP Template::footer($usuario);?>
</body>
</html>