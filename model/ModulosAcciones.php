<?php
//Con este modelo podremos hacer las consultas en la tabla de 
//modulos_Acciones.
class ModulosAcciones{
	//PROPIEDADES
	public $idAccion=0, $idModulo=0;

	//METODOS CRUD

	//Insertar
	public static function insertar(int $idAccion, int $idModulo){
		$consulta="INSERT INTO modulos_Acciones(idAccion,idModulo)
						VALUES($idAccion,$idModulo)";
						
		return DB::insertRelation($consulta);
	}

	//Borrar
	public static function borrar(int $idAccion, int $idModulo){
		$consulta="DELETE FROM modulos_acciones
					WHERE idAccion=$idAccion AND idModulo=$idModulo";

		return DB::delete($consulta);
	}

	//__toString()
	public function __toString():string{
		return "$this->idAccion $this->idModulo";
	}
}