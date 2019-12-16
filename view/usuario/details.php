<!DOCTYPE html>
<html>
	<head>
		<title>Detalles</title>
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
				<h2>Detalles del Usuario</h2>
				<h3><?=$u->user?></h3>
				<?php if(Login::isAdmin())
					echo "<p><b>ID: </b>$u->id</p>";
				?>
				<p><b>Usuario: </b><?=$u->user?></p>
				<p><b>Password: </b>************</p>
				<p><b>nombre: </b><?=$u->nombre?></p>
				<p><b>apellido1: </b><?=$u->apellido1?></p>
				<p><b>apellido2: </b><?=$u->apellido2?></p>
				<?php if(Login::isAdmin()){ ?>
					<p><b>Privilegio: </b><?=$u->privilegio?></p>
					<p><b>Admin: </b><?=$u->administrador?'SI':'NO'?></p>
				<?php } ?>
				<p><b>Email: </b><?=$u->email?></p>
				<p><b>Creado en: </b><?=$u->create_at?></p>
				<p><b>Modificado en: </b><?=$u->update_at?></p>

				<?php if(Login::privilegio(500)){?>
					<a class="opciones" href="/user/list">Volver al listado</a><br>		
				<?php }
				if(Login::isAdmin()){?>
					<a class="opciones" href="/user/edit/<?=$u->id?>">Editar Usuario</a><br>
					<a class="opciones" href="/user/delete/<?=$u->id?>">Borrar Usuario</a>
				<?php }?>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>