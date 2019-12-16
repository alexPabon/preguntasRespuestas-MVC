<?php
//Parametros de configuracion

//PARA EL AUTOLOAD
//list de directorios donde buscar las clases
$directorios=['controllers','model','libraries'];

//PARAMETROS DE CONFIGURACION BDD
define('SGDB','mysql');		//conector que debe usar PDO

define('DB_HOST','localhost');				//host
define('DB_USER', 'root');					//usuario
define('DB_PASS','');						//password
define('DB_NAME','activitat02_preguntes');	//base de datos
define('DB_CHARSET','utf8');				//codificacion

//CONTROLADOR Y METODO POR DEFECTO
define('DEFAULT_CONTROLLER', 'Welcome');
define('DEFAULT_METHOD','index');

//OTROS PARAMETROS
define('DEBUG',0);		//para depuracion