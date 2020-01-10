<?php
	$listaModulos='';
	$idAccion = $modulos[0]->idAccion;
	$codAccion=	$modulos[0]->codigoAcc;
	$nombAccion = $modulos[0]->nombreAcc; 
	
	$listaModulos.="<div class='contModulos'>";
	$listaModulos.="<h3 class='acciones'>".$codAccion.": ".$nombAccion."</h3>";
			//recorro el objeto $modulos para añadirlos en la variable $listaModulos
		foreach($modulos as $mod){							
			$listaModulos.="<p class='modulos'>";
				$listaModulos.="<a class='enlaceModulo' href='/query/resPreguntas/".$mod->id."' title='Resolver Cuestinario'>";
					$listaModulos.="- ". $mod->codigo.": ".$mod->nombre." ".$mod->horas." Horas.  ";
				$listaModulos.="</a>";
				if(Login::isAdmin())
					$listaModulos.="<a href='/ModulesActions/confirmDelete/".$idAccion."/".$mod->id."'>Quitar de Aquí</a>";							
			$listaModulos.="</p>";			
		}
	if(Login::isAdmin())
  		$listaModulos.="<a class='opciones' href='/modulesActions/addRelation/".$idAccion."'>Añadir Modulo</a>";
	$listaModulos.="</div>";		
?>
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
			Template::login($usuario);
			Template::menu();
		?>			
		<div class="contenido">

			<div class="marco detalles">
				<h2>Lista de Modulos</h2>
				<?=$listaModulos?>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>