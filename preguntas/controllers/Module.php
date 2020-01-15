<?php
//El controlador Module será el responsable de gestionar todas las
//operaciones con modulos.

	//CONTROLADOR MODULE para la gestion de modulos
class Module{
    
    	//operacion por defecto
    public function index(){
        $this->list();      //listado de modulos
    }
    
    	//lista de modulos
    public function list(){

    		//recupera la lista de acciones
        $acciones=Accion::get();
        	//recupera la lista de modulos
        $modulos=Modulo::get();
        
       		//cagar los usuarios
        $usuario=Login::getUsuario();
        
        	//cargar la vista del listado        
        include '../../preguntas/view/modulo/list.php';
    }
    
    	//muestra un modulo
    public function show($id=false){
        	//Comprobar que llega el codigo
        if(!$id)
            throw new Exception("No se indico el modulo");

        	//cagar los usuarios
        $usuario=Login::getUsuario();
        
        	//Recupera el modulo con dicho codigo
        $modulo= Modulo::getModulo($id);        
        
        	//comprobar que el modulo existe
        if(!$modulo)
            throw new Exception("No existe el modulo $id");
        
        	//cargar la vista de detalles
        include '../../preguntas/view/modulo/details.php';
    }

        //muestra los modulos que corresponden a una accion formativa
    public function showModuls($id=false){
            //Comprobar que llega el codigo
        if(!$id)
            throw new Exception("No se indico el modulo");

            //cagar los usuarios
        $usuario=Login::getUsuario();
        
            //Recupera el modulo con dicho codigo
        $modulos= Modulo::getAccionModulos($id);        
        
            //comprobar que el modulo existe
        if(!$modulos)
            throw new Exception("No hay modulos en esta accion formativa");
        
            //cargar la vista de detalles
        include '../../preguntas/view/modulo/modulosAccion.php';
    }
    
    	//muestra el formulario de un modulo
    public function create(){
        	//solo los administradores pueden listar usuarios
        // if(!Login::isAdmin())
        //     throw new Exception("Debes ser administrador");
        
        	//cagar los usuarios
        $usuario=Login::getUsuario();
        	//obtenemos las acciones
        $acciones=Accion::get();
        include '../../preguntas/view/modulo/form_new.php';
    }
    
    	//Guarda el nuevo modulo
    public function store(){
    		//comprobar que llegue los datos por post
    	if(empty($_POST['nombre']))
    		throw new Exception("Hay campos que estan sin rellenar");    		
    		//solo los administradores pueden crear Modulos
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
        	//recibimos el id de la accion
        $idAcc = intval($_POST['idAccion']);
        if($idAcc==0)
            throw new Exception("No eligio una Accio formativa");
            
        	//crea el nuevo modulo con los datos POST
        $modulo = new Modulo();
        $modulo->codigo=DB::escape($_POST['codigo']);
        $modulo->nombre=DB::escape($_POST['nombre']);        
        $modulo->horas=intval($_POST['horas']);        
        
        if(!$modulo->guardar($idAcc))  //guardar en la BDD
            throw new Exception("No se pudo guardar $modulo->nombre");
        
        	//cagar los usuarios
        $usuario=Login::getUsuario();
        	//muestra la vista de exito
        $mensaje = "Guardado del modulo $modulo->nombre correcto";
        include '../../preguntas/view/exito.php';   //mostrar exito
        header("refresh:7, url=/");
    }

	    //ACTUALIZAR SE HACE EN DOS PASOS
	    //1ºmuestra el formulario de edicion de un modulo
    public function edit($id=false){    		    		
    		//solo los administradores pueden crear Modulos
        // if(!Login::isAdmin())
        //     throw new Exception("Debes ser administrador");
        	//comprobar que me llega un identificador
        if(!$id)
            throw new Exception("No se indico el modulo");

        	//cagar los usuarios
        $usuario=Login::getUsuario();

        	//recuperar el modulo con dicho codigo
        $modulo=Modulo::getModulo($id);

        	//comprobar que el modulo existe
        if(!$modulo)
            throw new Exception("No existe el modulo $id");

        	//cargar la vista del formulario
        include '../../preguntas/view/modulo/form_update.php';
    }

    	//2ºaplica los cambio de un modulo
    public function update(){ 
    		//comprobar que llegue los datos por post
    	if(empty($_POST['nombre']))
    		throw new Exception("Intentas Acceder sin formulario");   	  		
    		//solo los administradores pueden crear Modulos
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");

        $modulo = new Modulo();   //nuevo modulo
        $modulo->id=intval($_POST['id']);    //recupera el id via POST
        
        $modulo->codigo=DB::escape($_POST['codigo']);     //resto de campos
        $modulo->nombre=DB::escape($_POST['nombre']);        
        $modulo->horas=intval($_POST['horas']);        
        
        if($modulo->actualizar()===false)    //intenta actualizar
            throw new Exception("No se puede actulizar");

        $this->show($modulo->id);    //OPCION 3: detalles del modulo actualizado
    }

    //ELIMINAR SE HACE EN DOS PASOS
    //(si queremos formulario de confirmacion)

    	//1ºmuestra el formulario de confirmacion de eliminacion
    public function delete($id){    	    		
    		//solo los administradores pueden crear Modulos
        // if(!Login::isAdmin())
        //     throw new Exception("Debes ser administrador");

        	//comprobar que llega el identificador
        if(!$id)
            throw new Exception("No se indico el modulo");

        	//recuperar el modulo con dicho identificador
        $modulo=Modulo::getModulo($id);

        	//cagar los usuarios
        $usuario=Login::getUsuario();
        	//comprobar que el modulo existe
        if(!$modulo)
            throw new Exception("No existe el modulo $id");

        	//ir al formulario de confirmacion
        include '../../preguntas/view/modulo/confirm_delete.php';
    }

    	//elimina el modulo
    public function destroy(){
    		//comprobar que llegue los datos por post
    	if(empty($_POST['id']))
    		throw new Exception("Intentas Acceder sin formulario");    		
    		//solo los administradores pueden crear Modulos
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");

        	//recupera el identicador via POST
        $id=intval($_POST['id']);

        if(!Modulo::borrar($id))
            throw new Exception("No se pudo borrar");

        	//carga los usuarios
        $usuario=Login::getUsuario();
        
        	//mostrar la vista de exito
        $mensaje="Borrado correcto!";
        include '../../preguntas/view/exito.php';   //mostrar exito 

        header("refresh:7, url=/");
    }
}
