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
				<h2>Formulario para actualizar Modulo</h2>
				<form method="post" action="/module/update">
					<ul class="formularios">
						<li>
							<input type="hidden" name="id" value="<?=$modulo->id?>">
							<label for="codigo">Codigo</label>
							<input id="codigo" class="entradas" type="text" name="codigo" value="<?=$modulo->codigo?>">
						</li>
						<li>
							<label for="nombre">Nombre</label>
							<input id="nombre" class="entradas" type="text" name="nombre" value="<?=$modulo->nombre?>">
						</li>
						<li>
							<label for="horas">Horas</label>
							<input id="horas" class="entradas" type="number" min="0" name="horas" value="<?=$modulo->horas?>">
						</li>								
					</ul>					
					<input type="submit" name="actualizar" value="Actualizar Modulo">
				</form>
				<p><a class="opciones" href="/module/list">Volver al listado</a></p>
				
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>