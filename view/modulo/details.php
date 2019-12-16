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
				<h2>Detalles del Modulo</h2>

				<p><b>Codigo: </b><br><?=$modulo->codigo?></p>
				<p><b>Nombre: </b><br><?=$modulo->nombre?></p>
				<p><b>Horas: </b><br><?=$modulo->horas?></p>

				<a class="opciones" href="/module/edit/<?=$modulo->id?>">Editar Modulo</a><br>
				<a class="opciones" href="/module/delete/<?=$modulo->id?>">Borrar Modulo</a><br>
				<a class="opciones" href="/module/list">Volver al listado</a>				
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>