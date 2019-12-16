<?php
function load($clase){
	//variable Global
	global $directorios;

	//para cada directorio de la lista
	foreach ($directorios as $directorio){
		$ruta= "$directorio/$clase.php";

		//si existe el fichero y es legible, cargalo
		if(is_readable($ruta)){
			require_once($ruta);
			break;
		}
	}	
}
spl_autoload_register("load");

