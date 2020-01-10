<!DOCTYPE html>
<html>
	<head>
		<title>Nueva Accion</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
		<link rel="stylesheet" type="text/css" href="/css/templates.css">
		<link rel="stylesheet" type="text/css" href="/css/acciones.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="/js/templates.js"></script>
		<script type="text/javascript" src="/js/acciones.js"></script>
	</head>
	<body>
		<?php 
			//Template::header();
			Template::login($usuario);
			Template::menu();
		?>
		<div class="contenido">
			<div class="marco">
				<h2>Formulario para nueva Accion</h2>
				<form method="post" action="/action/store">
					<ul class="formularios">
						<li>
							<label for="codigo">Codigo</label>
							<input id="codigo" class="entradas" type="text" name="codigo"><br>
						</li>
						<li>
							<label for="nombre">Nombre</label>
							<input id="nombre" class="entradas" type="text" name="nombre"><br>
						</li>
						<li>
							<label for="descripcion">Descripcion</label>
							<textarea id="descripcion" class="texto" name="descripcion"></textarea><br>
						</li>
						<li>
							<label for="objetivos">Objetivos</label>
							<textarea id="objetivos" class="texto" name="objetivos"></textarea><br>	
						</li>
						<li>
							<label for="nivel">Nivel</label>
							<input id="nivel" class="entradas" type="number" min="0" name="nivel"><br>
						</li>
						<li>
							<label for="requisitos">Requisitos</label>
							<textarea id="requisitos" class="texto" name="requisitos"></textarea><br>
						</li>						
					</ul>
					<input type="submit" name="guardar" value="Guardar Accion">
				</form>
				<p><a class="opciones" href="/action/list">Volver al listado</a></p>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>