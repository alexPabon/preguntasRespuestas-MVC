<!DOCTYPE html>
<html>
	<head>
		<title>Confirmar borrado</title>
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
				<h2>Confirmar borrado</h2>

				<p>Confirmar el borrado del Usuario <?="$u->user ($u->email)"?></p>
				<form method="post" action="/user/destroy">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="submit" name="confirmarborrado" value="Borrar Usuario">
				</form>
				<p><a class="opciones" href="/user/list">Volver al listado</a></p>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>