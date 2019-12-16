<!DOCTYPE html>
<html>
<head>
	<title>actualizar usuario</title>
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
			<h2>Formulario para actualizar Usuario</h2>		
			<form method="post" action="/user/update">
				<ul class="formularios">
					<li>					
						<label>Usuario: </label>
						<input class="entradas" type="text" name="user" value="<?=$u->user?>">
						<input type="hidden" name="id" value="<?=$u->id?>">
					</li>
					<li>
						<label>Password: </label>
						<input class="entradas" type="text" name="password">
					</li>
					<li>
						<label>Nombre: </label>
						<input class="entradas" type="text" name="nombre"value="<?=$u->nombre?>">
					</li>
					<li>
						<label>Primer apellido: </label>
						<input class="entradas" type="text" name="apellido1"value="<?=$u->apellido1?>">
					</li>
					<li>
						<label>Segundo Apellido: </label>
						<input class="entradas" type="text" name="apellido2"value="<?=$u->apellido2?>">
					</li>
					<?php if(Login::isAdmin()){?>
						<li>
							<label>Privilegio: </label>
							<input class="entradas" type="number" min="0" max="1000" name="privilegio" value="<?=$u->privilegio?>">
						</li>
						<li>
							<label>Admin: </label>
							<input type="checkbox" name="administrador" value="1" <?=$u->administrador?'checked':''?>>
						</li>
					<?php }?>
					<li>
						<label>Email: </label>
						<input class="entradas" type="email" name="email" value="<?=$u->email?>">
					</li>
				</ul>
				<input type="submit" name="actualizar" value="Actualizar Usuario">
			</form>
			<?php if(Login::privilegio(500)){?>
				<p><a class="opciones" href="/user/list">Volver al listado</a></p>
			<?php }?>
		</div>
	</div>
	<?PHP Template::footer($usuario);?>
</body>
</html>