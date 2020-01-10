<?php
//El controlador Acciones será el responsable de gestionar todas las
//operaciones con acciones.

//CONTROLADOR ACCIONES para la gestion de model/acciones
class Action{
    
        //operacion por defecto
    public function index(){
        $this->list();      //listado de acciones
    }
    
        //lista de acciones
    public function list(){
            //recupera la lista de acciones
        $acciones=Accion::get();
        
            //cagar los usuarios
        $usuario=Login::getUsuario();
        
            //cargar la vista del listado
        include '../../preguntas/view/acciones/list.php';
    }
    
        //muestra una accion
    public function show($id=false){
            //Comprobar que llega el codigo
        if(!$id)
            throw new Exception("No se indico la accion");
        
            //Recupera la accion con dicho codigo
        $accion= Accion::getAccion($id);
        
            //comprobar que la accion existe
        if(!$accion)
            throw new Exception("No existe la accion $id");
        
            //carga los usuarios
        $usuario=Login::getUsuario();
            //cargar la vista de detalles
        include '../../preguntas/view/acciones/details.php';
    }
    
        //muestra el formulario de una accion
    public function create(){
            //solo los administradores pueden crear Acciones
        // if(!Login::isAdmin())
        //     throw new Exception("Debes ser administrador");
        
         //carga los usuarios
        $usuario=Login::getUsuario();
        include '../../preguntas/view/acciones/form_new.php';
    }
    
        //Guarda la nueva accion
    public function store(){
            //comprabar que llegan los datos por post
        if(empty($_POST['nombre']))
            throw new Exception("Debes rellenar todos los campos");
            //solo los administradores pueden crear Acciones
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
            //crea la nueva accion con los datos POST
        $accion = new Accion();
        $accion->codigo=DB::escape($_POST['codigo']);
        $accion->nombre=DB::escape($_POST['nombre']);
        $accion->descripcion=DB::escape($_POST['descripcion']);
        $accion->objetivos=DB::escape($_POST['objetivos']);        
        $accion->nivel=intval($_POST['nivel']);
        $accion->requisitos=DB::escape($_POST['requisitos']);        
        
        if(!$accion->guardar())  //guardar en la BDD
            throw new Exception("No se pudo guardar $accion->nombre");
        
            //muestra la vista de exito
        $mensaje = "Guardado de la accion $accion->nombre correcto";
            //carga los usuarios
        $usuario=Login::getUsuario();
        include '../../preguntas/view/exito.php';   //mostrar exito

        header("refresh:7, url=/"); //redirecciona a la pagina principal despues de 7s
    }

        //ACTUALIZAR SE HACE EN DOS PASOS
        // 1º muestra el formulario de edicion de una accion
    public function edit($id=false){
            //solo los administradores pueden editar las acciones
        // if(!Login::isAdmin())
        //     throw new Exception("Debes ser administrador");
        
            //comprobar que me llega un identificador
        if(!$id)
            throw new Exception("No se indico la accion");

            //recuperar el accion con dicho codigo
        $accion=Accion::getAccion($id);

            //comprobar que el accion existe
        if(!$accion)
            throw new Exception("No existe la accion $id");

            //carga los usuarios
        $usuario=Login::getUsuario();
            //cargar la vista del formulario
        include '../../preguntas/view/acciones/form_update.php';
    }

    //  2º aplica los cambio de un accion
    public function update(){
            //compruebo que llegan los datos por post
        if(empty($_POST['nombre']))
            throw new Exception("Debes rellenar todos los campos");            
            //solo los administradores pueden actulizar acciones
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
        
        $accion = new Accion();   //nueva accion
        $accion->id=intval($_POST['id']);    //recupera el id via POST
        
        $accion->codigo=DB::escape($_POST['codigo']);     //resto de campos
        $accion->nombre=DB::escape($_POST['nombre']);
        $accion->descripcion=DB::escape($_POST['descripcion']);
        $accion->objetivos=DB::escape($_POST['objetivos']);
        $accion->nivel=intval($_POST['nivel']);
        $accion->requisitos=DB::escape($_POST['requisitos']);                
        
        if($accion->actualizar()===false)    //intenta actualizar
            throw new Exception("No se puede actulizar");

        $this->show($accion->id);    //OPCION 3: detalles de la accion actualizado
    }

    //ELIMINAR SE HACE EN DOS PASOS
    //(si queremos formulario de confirmacion)

    // 1º muestra el formulario de confirmacion de eliminacion
    public function delete($id){
            //solo los administradores pueden actulizar acciones
        // if(!Login::isAdmin())
        //     throw new Exception("Debes ser administrador");
            //comprobar que llega el identificador
        if(!$id)
            throw new Exception("No se indico el accion");

            //recuperar el accion con dicho identificador
        $accion=Accion::getAccion($id);

            //comprobar que el accion existe
        if(!$accion)
            throw new Exception("No existe la accion $id");

            //carga los usuarios
        $usuario=Login::getUsuario();
            //ir al formulario de confirmacion
        include '../../preguntas/view/acciones/confirm_delete.php';
    }

    //2º elimina el accion
    public function destroy(){
            //compruebo que llegan los datos por post
        if(empty($_POST['id']))
            throw new Exception("Intentas acceder sin formulario");            
            //solo los administradores pueden actulizar acciones
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
        //recupera el identicador via POST
        $id=intval($_POST['id']);

        if(!Accion::borrar($id))
            throw new Exception("No se pudo borrar");
        
        //carga los usuarios
        $usuario=Login::getUsuario();

        //mostrar la vista de exito
        $mensaje="Borrado correcto!";
        include '../../preguntas/view/exito.php';   //mostrar exito

        header('refresh:7, url=/');
            
    }
}
