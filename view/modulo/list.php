<?php
	$listaModulos='';
	$flag=true;

		//recorro el objeto $acciones y cada vez, recorro el objeto $modulo para ver si
		//coinciden el $acc->id con $mod->idAccion
	foreach($acciones as $acc){
		$listaModulos.="<div class='contModulos'>";
			$listaModulos.="<h3 class='acciones'>".$acc->codigo.": ".$acc->nombre."</h3>";
			foreach($modulos as $mod){
				if($acc->id == $mod->idAccion){				
					$listaModulos.="<p class='modulos'>";
						$listaModulos.="<a class='enlaceModulo' href='' title='Resolver Cuestinario'>";
							$listaModulos.="- ". $mod->codigo.": ".$mod->nombre." ".$mod->horas." Horas.  ";
						$listaModulos.="</a>";
							if(Login::isAdmin()){
								$listaModulos.="<a href='/module/edit/".$mod->id."'>Editar</a>";
								$listaModulos.="<a href='/module/delete/".$mod->id."'>Borrar</a>";
							}						
					$listaModulos.="</p>";
				}
			}
		if(Login::isAdmin())
  			$listaModulos.="<a class='opciones' href='/modulesActions/addRelation/".$acc->id."'>Añadir Modulo</a>";
		$listaModulos.="</div>";
	}

		//si es admin, mostrara los modulos que no tenga relacionado ninguna accion formativa
	if(Login::isAdmin()){
		$listaModulos.="<div class='contSinAccion'>";
		foreach($modulos as $mod)
			if($mod->idAccion==''){			
					if($flag){				
						$listaModulos.="<h3>Estos Modulos No pertenecen a ninguna accion formativa</h3>";
						$flag=false;
					}
					$listaModulos.="<p class='modulos'>";
						$listaModulos.="<a class='enlaceModulo' href='' title='Resolver Cuestinario'>";
							$listaModulos.="- ".$mod->codigo.": ".$mod->nombre." ".$mod->horas." Horas.  ";
							$listaModulos.="<a href='/module/edit/".$mod->id."'>Editar</a>";
							$listaModulos.="<a href='/module/delete/".$mod->id."'>Borrar</a>";
						$listaModulos.="</a>";
					$listaModulos.="</p>";			
			}
		$listaModulos.="</div>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>lista de Modulos</title>
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

			<div class="marco">
				<h2>Lista de acciones formativas con sus Modulos</h2>
				<?=$listaModulos?>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>