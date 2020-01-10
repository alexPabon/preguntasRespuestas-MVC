<!DOCTYPE html>
<html>
	<head>
		<title>lista de Acciones Formativas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
		<link rel="stylesheet" type="text/css" href="/css/templates.css">
		<link rel="stylesheet" type="text/css" href="/css/acciones.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="/js/templates.js"></script>
		<script type="text/javascript" src="/js/acciones.js"></script>
	</head>
	<body onload="cargarPagina()">
		<?php 
			//Template::header();
			Template::login($usuario);
			Template::menu();
		?>		
		<div class="contenido">
			<div class="marco">
				<h2>Confirmar borrado</h2>

				<p>Confirmar el borrado de la accion <?="$accion->codigo $accion->nombre"?></p>
				<form method="post" action="/action/destroy">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="submit" name="confirmarborrado" value="Borrar Accion">
				</form>
				<p><a class="opciones" href="/action/list">Volver al listado</a></p>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>
