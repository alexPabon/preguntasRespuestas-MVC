<!DOCTYPE html>
<html>
	<head>
		<title>Portada</title>
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
		<h1 class="info">Error!</h1>
		<p class="mensaje"><?=$mensaje?></p>
		<div class="contenido"></div>		
		<?PHP Template::footer($usuario);?>
	</body>
</html>