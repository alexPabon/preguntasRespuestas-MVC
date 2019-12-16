<?php
class Login{
	//propiedad que contendra el usuario identificador
	private static $usuario = NULL;

	//metodo que retorna el usuario indentificado
	public static function getUsuario(){
		return self::$usuario;
	}

	//metodo que comprueba si el usuario identificador tiene un
	//valor de privilegio superior al indicado
	public static function privilegio($valor=0){
		return self::$usuario? self::$usuario->privilegio>=$valor:false;
	}

	//metod que retorna si el usuario identificado es admin
	public static function isAdmin(){
		return self::$usuario && self::$usuario->administrador;
	}

	//metodo que realiza la operacion de login
	public static function log_in($u,$p){
		//trata de indentificar el usuario
		$user=Usuario::identificar($u,$p);

		//si no se puede recuperar el usuario a partir de los datos..
		if(!$user) throw new Exception("Error en la identificacion");

		//almacena el usuario identificado en la variable de sesion
		$_SESSION['user']=serialize($user);
	}

	//metodo que realiza la operacion de logout
	public static function log_out(){
		session_unset();	//vacia el array de sesion

		header("Refresh:0.7; url=/");
		die('<h2>Redirigiendo a la portada....<h2>');
	}	

	//Metodo que gestiona las operaciones de login-logout a partir
	//de las solicitudes del usuario(envio de los formularios)
	public static function comprobar(){
		//si piden hacer login
		if(!empty($_POST['login']))
			self::log_in($_POST['user'],MD5($_POST['password']));

		//si piden hacer logout
		if(!empty($_POST['logout']))
			self::log_out();		

		//hagan o no login, recuperamos la info de la var de sesion
		//para guardarla en la propiedad $usuario
		self::$usuario=empty($_SESSION['user'])?	NULL:unserialize($_SESSION['user']);
	}
}