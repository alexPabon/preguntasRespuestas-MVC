<!DOCTYPE html>
<html>
	<head>
		<title>Modulos de Accion formativa</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
		<link rel="stylesheet" type="text/css" href="/css/templates.css">
		<link rel="stylesheet" type="text/css" href="/css/modulos.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="/js/templates.js"></script>
		<script type="text/javascript" src="/js/modulos.js"></script>
	</head>
	<body>
		<?php 
			//Template::header();
			Template::login($usuario);
			Template::menu();
		?>			
		<div class="contenido">
			<div class="marco">
				<p class="notasInformativas">Esta seguro que desea quitar la relacion de la Accion formativa con el modulo?</p>
				<form method="post" action="/ModulesActions/unlinkActionModule">
					<input type="hidden" name="idAccion" value="<?=$id1?>">
					<input type="hidden" name="idModulo" value="<?=$id2?>">
					<input type="submit" name="borrar" value="Retirar Modulo">
					<input type="submit" name="cancelar" value="Cancelar">
				</form>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>