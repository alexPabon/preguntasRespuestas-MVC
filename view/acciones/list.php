<?php
	$listaAcciones='';
	$contador=0;
		//Si existe el objeto $acciones, lo recorre añadiendo el contenido en la variable
		//$listaAcciones
	if(isset($acciones))
		foreach ($acciones as $acc){
			$contador++;
			$listaAcciones.="<div class='contenedor'>";
				$listaAcciones.="<p id='pr".$contador."'>";
					$listaAcciones.=$contador.'. '. $acc->codigo.':  ';
					$listaAcciones.="<b>".$acc->nombre."</b>";
					if(Login::isAdmin()){
						$listaAcciones.=" <a href='/action/edit/".$acc->id."'>Editar</a>";
						$listaAcciones.="<a href='/action/delete/".$acc->id."'>Borrar</a>";
					}
				$listaAcciones.="</p>";
			  	$listaAcciones.="<p class='accDescripcion'>";
			  		$listaAcciones.="<b>Descripcion:</b><br>".nl2br($acc->descripcion)."<br>";
				  	$listaAcciones.="<br><b class='subtitulos'>Objetivos:</b><br>".nl2br($acc->objetivos)."<br>";
				  	$listaAcciones.="<br><b class='subtitulos'>Nivel: </b>".$acc->nivel."<br>";
				  	$listaAcciones.="<br><b class='subtitulos'>Requisitos:</b><br>".nl2br($acc->requisitos)."<br><br>";
				  	$listaAcciones.="<a class='opciones' href='/module/showModuls/".$acc->id."'>Ver Modulos</a>";
				  	if(Login::isAdmin())
				  		$listaAcciones.="<a class='opciones' href='/modulesActions/addRelation/".$acc->id."'>Añadir Modulos</a>";
			  	$listaAcciones.="</p>";			  
		  	$listaAcciones.="</div>";
		}
?>
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
				<h2>Lista de Acciones formativas</h2>				
				<?= $listaAcciones ?>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>
