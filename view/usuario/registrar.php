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
		?>	
		<div class="contenido">
			<div class="marco">
				<h2>Formulario para nuevo Usuario</h2>
				<form method="post" action="/user/registrar">
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
							<label>Email: </label>
							<input class="entradas" type="email" name="email">
						</li>
					</ul>

					<input type="submit" name="guardar" value="Registrar usuario">
				</form>		
			</div>
		</div>		
		<?PHP Template::footer($usuario);?>
	</body>
</html>