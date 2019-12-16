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
				<h2>Detalles de la Accion</h2>
				
				<p><b>Codigo: </b><?=$accion->codigo?></p>
				<p><b>Nombre: </b><?=$accion->nombre?></p>
				<p><b>Descripcion:</b><br><?=$accion->descripcion?></p>
				<p><b>Objetivos:</b><br><?=$accion->objetivos?></p>
				<p><b>Nivel:</b><?=$accion->nivel?></p>
				<p><b>Requisitos:</b><br><?=$accion->requisitos?></p>

				<a class="opciones" href="/action/edit/<?=$accion->id?>">Editar Accion</a><br>
				<a class="opciones" href="/action/delete/<?=$accion->id?>">Borrar Accion</a><br>
			</div>
		</div>
	</body>
</html>