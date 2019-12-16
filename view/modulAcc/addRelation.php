<?php
	$listaModulos='';
	$nombreAccion='';
	$idModulo=[];

		//recorro el objeto $acciones para extraer el nombre de la accion formativa
	foreach($acciones as $acc)
		if($id==$acc->id)
			$nombreAccion="<option value='$acc->id'>".$acc->codigo.": ".$acc->nombre."</option>";
		
		//recorro el objeto $modulos para extraer las coincidencias del $id con el $mod->idAccion
		//y las inserto en el array
	foreach($modulos as $mod)
		if($mod->idAccion==$id)			
			$idModulo[]=$mod->id;		

		//recorro el objeto $modulos, pero esta vez, descarto los modulos que estan en la accion
		//formativa
	foreach($modulos as $mod)
		if($mod->idAccion!=$id){
			$flag=true;

			for($i=0;$i<count($idModulo); $i++)
				if($idModulo[$i]==$mod->id)
					$flag=false;

			if($flag)
				$listaModulos.="<option value='$mod->id'>".$mod->codigo.": ".$mod->nombre." ".$mod->horas." Horas.</option>";		
		}	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Modulos de Accion formativa</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
		<link rel="stylesheet" type="text/css" href="/css/templates.css">
		<link rel="stylesheet" type="text/css" href="/css/modulAcc.css">
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
				<p class="notasInformativas">Debera elegir el modulo que desea añadir a la accion formativa</p>
				<form method="post" action="/ModulesActions/bindActionModule">
					<ul>
						<li>
							<label>Nombre de la accion formativa</label>					
							<select name="accion">
								<?=$nombreAccion?>	
							</select>
						</li>
						<li>
							<label for="modulo">Elegir Modulo</label>
							<select id="modulo" name="modulo">
								<option disabled selected></option>
								<?= $listaModulos?>
							</select>	
						</li>
					</ul>					
					<input type="submit" name="guardar" value="Guardar Cambios">
					<input type="submit" name="cancelar" value="Cancelar">
				</form>
				<h1></h1> 
				
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>