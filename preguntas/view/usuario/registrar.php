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
			Template::menu();
		?>	
		<div class="contenido">
			<div class="marco">
				<h2>Formulario para nuevo Usuario</h2>
				<form id="formRegistro" method="post" action="/user/registrar">
					<ul class="formularios">
						<li>					
							<label for="user">Usuario: </label>
							<input class="entradas" id="user" type="text" name="user">			
						</li>
						<li>
							<label for="pass">Contraseña: </label>
							<input class="entradas" id="pass" type="password" name="password">
						</li>
						<li>
							<label for="rpass">Repetir Contraseña: </label>
							<input class="entradas" id="rpass" type="password">
							<p id="msnPass"></p>
						</li>
						<li>
							<label for="regNombre">Nombre: </label>
							<input class="entradas" id="regNombre" type="text" name="nombre">
						</li>				
						<li>
							<label for="regEmail">Email: </label>
							<input class="entradas" id="regEmail" type="email" name="email">
						</li>
					</ul>

					<input type="submit" name="guardar" value="Registrar usuario">
				</form>
				<p id="msnError"></p>	
			</div>
		</div>		
		<?PHP Template::footer($usuario);?>
	</body>
</html>