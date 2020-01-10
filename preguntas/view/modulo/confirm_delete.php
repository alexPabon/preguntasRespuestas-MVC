<!DOCTYPE html>
<html>
	<head>
		<title>Editar Modulo</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
		<link rel="stylesheet" type="text/css" href="/css/templates.css">
		<link rel="stylesheet" type="text/css" href="/css/modulos.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="/js/templates.js"></script>
		<script type="text/javascript" src="/js/modulos.js"></script>
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

				<p>Confirmar el borrado del Modulo <?="$modulo->nombre"?></p>
				<form method="post" action="/module/destroy">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="submit" name="confirmarborrado" value="Borrar Libro">
				</form>
				<p><a class="opciones" href="/module/list">Volver al listado</a></p>				
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Borrar Modulo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/estilos.css">
</head>
<body>
	
</body>
</html>