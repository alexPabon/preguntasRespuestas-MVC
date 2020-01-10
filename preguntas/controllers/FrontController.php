<?php
//CONTROLADOR FRONTAL
class FrontController{

	//metodo principal del controlador frontal
	public static function main(){
		try {
			//control login_logout
			Login::comprobar();

			//GESTION DE PETICIONES(dispatcher)
			//recupera el controlador de la peticion y la primera letra la pone en mayuscula
			$c=empty($_GET['c'])?DEFAULT_CONTROLLER : ucfirst($_GET['c']);

			//recupera el metodo de la peticion
			$m=empty($_GET['m'])?DEFAULT_METHOD : $_GET['m'];

			//recupera el parametro correspondiente
			$p=empty($_GET['p'])?'':$_GET['p'];

			$p1=empty($_GET['p1'])?'':$_GET['p1'];

			//cargar el Controler correspondiente
			$controlador = new $c();

			//Coprobamos si existe el metodo
			if(!is_callable([$controlador,$m]))
				throw new Exception("No exite la operacion $m");

			//llama al metodo del controlador, pasando e parametro
			$controlador->$m($p,$p1);

		} catch (Throwable $e) {			//si se produce algun error...
			$mensaje=$e->getMessage();		//recupera el mensaje de error

			$usuario=Login::getUsuario();	//variable con info del usuario
			include 'view/error.php'; 		//carga la vista de error

			header("refresh:6, url=/");
		}
	}
}