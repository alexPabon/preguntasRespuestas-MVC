<?php
class DB{
	//PROPIEDADES
	private static $conexion=null;			//contendrá la conexion con la BDD

	//METODOS
		//Metodos que conecta/recupera la conexion con BDD
	public static function get():PDO{
		if(!self::$conexion){			//si no estamos conectados...
			$dsn=SGDB.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;

				//conecta con la BDD, sino lazara una PDOException
			self::$conexion=new PDO($dsn,DB_USER,DB_PASS);
		}

		return self::$conexion;
	}

		//metodo para realizar consultas SELECT de una fila
	public static function select(string $consulta, string $class='stdClass'){
		$resultado = self::get()->query($consulta);
		return $resultado->rowCount()?$resultado->fetchObject($class):null;
	}

		//metodo para consultas SELECT de multiples filas
	public static function selectAll(string $consulta, string $class='stdClass'):array{
		$resultado = self::get()->query($consulta);
		$objeto=[];

		while($r=$resultado->fetchObject($class))
			$objeto[]=$r;

		return $objeto;
	}

		//metodo para INSERT, retorna valor autonumerico o false en caso de error
	public static function insert( string $consulta){
		if(!self::get()->query($consulta))return false;
		return self::get()->lastInsertId();
	}

		//metodo para INSERT, retorna valor true o false en caso de error
	public static function insertRelation( string $consulta){
		if(!self::get()->query($consulta))
			return false;
		else
			return true;		
	}

		//metodo para UPDATE, retorna el numero de filas afectadas o false en caso de error
	public static function update(string $consulta){
		$resultado=self::get()->query($consulta);
		return $resultado?$resultado->rowCount():false;
	}

		//metodo para DELETE, retorna el numero de filas afectadas o false en caso de error
	public static function delete(string $consulta){
		$resultado = self::get()->query($consulta);
		return $resultado?$resultado->rowCount():false;
	}

		//metodo para escapar caracteres especiales
		//evita inyeccion de scripts(version para PDO)
	public static function escape(string $texto){
		return htmlspecialchars($texto);
	}
}