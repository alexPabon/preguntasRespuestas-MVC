<?php
//El controlador ModulsActions sera el responsable de gestionar
//las operaciones modulosAcciones
class ModulesActions{

	 	//operacion por defecto
    public function index(){
        header("refresh:0 url=/");      //listado de modulos
    }

    	//Muestra el formulario para relacionar Acciones y modulos
    public function addRelation($id=false){
    	if(!Login::isAdmin())
			throw new Exception("Debes ser administrador");
		if(!$id)
			throw new Exception("Faltan parametros");

		$acciones=Accion::get();
		$modulos = Modulo::get();
			//cagar los usuarios
        $usuario=Login::getUsuario();
    	include 'view/modulAcc/addRelation.php';

    }

    	//Realiza la consulta de insercion de la relacion que llega por post
	public function bindActionModule(){
		if(!Login::isAdmin())
			throw new Exception("Debes ser administrador");									
		
		$idAccion= intval($_POST['accion']);
		$idModulo= isset($_POST['modulo'])?intval($_POST['modulo']):'';		
		$cancelar= isset($_POST['cancelar'])?$_POST['cancelar']:'';

		if(!empty($cancelar))
			header('location:/module/showModuls/'.$idAccion);

		if(empty($_POST['modulo']))
			throw new Exception("Faltan datos en el formulario");

		$insertar= ModulosAcciones::insertar($idAccion,$idModulo);		
		if(!$insertar)
			throw new Exception("No se pudo añadir la relacion Accion Formativa y Modulo");

			//cagar los usuarios
        $usuario=Login::getUsuario();
			//mostrar la vista de exito
        $mensaje="Vinculado correctamente el modulo en la accion formativa!";
        include 'view/exito.php';   //mostrar exito 

        header("refresh:1.2, url=/module/showModuls/".$idAccion);
	}

		//Muestra el formulario para confirmar que quita la relacion
		//entre la accion y el mudolo
	public function confirmDelete($id1=false, $id2=false){
		if(!Login::isAdmin())
			throw new Exception("Debes ser administrador");
		if(!($id1&&$id2))
			throw new Exception("Faltan parametros");		

			//cagar los usuarios
        $usuario=Login::getUsuario();
		include "view/modulAcc/confirm_delete.php";
	}

		//Realiza la consulta Delete para quitar la relacion accion y modulo
	public function unlinkActionModule(){
		if(!Login::isAdmin())
			throw new Exception("Debes ser administrador");		
		$idAccion= intval($_POST['idAccion']);
		$idModulo= intval($_POST['idModulo']);
		$cancelar= isset($_POST['cancelar'])?$_POST['cancelar']:'';

		if(!empty($cancelar))
			header('location:/module/showModuls/'.$idAccion);

		if(!ModulosAcciones::borrar($idAccion,$idModulo))
			throw new Exception("No se pudo quitar la relacion Accion Formativa y Modulo");

			//cagar los usuarios
        $usuario=Login::getUsuario();
			//mostrar la vista de exito
        $mensaje="Se quito correctamente el modulo de la accion formativa!";
        include 'view/exito.php';   //mostrar exito 

        header("refresh:1.2, url=/module/showModuls/".$idAccion);
	}
}