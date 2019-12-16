<?php
//controlador por defecto
class Welcome{

	public static function index(){
		//recupera el usuario para pasarselo a la vista
		$usuario=Login::getUsuario();

		//carga la vista de portada;
		include 'view/portada.php';
	}
}