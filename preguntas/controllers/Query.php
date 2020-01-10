<?php
//El controlador Query será el responsable de gestionar todas las
//operaciones con las tablas de preguntas y respuestas.

	//CONTROLADOR PREGUNTAS para la gestion de model/pregunta
class Query{
    
    	//operacion por defecto
    public function index(){
        $this->list();      //listado de preguntas
    }
    
    	//lista de preguntas
    public function list(){
        if(!Login::getUsuario())
            throw new Exception('debes estar identificado');
        
        $modulos = Modulo::getSoloModulos();
        $preguntas=Pregunta::get();
        $respuestas=Respuesta::get();
        
        	//cagar los usuarios
        $usuario=Login::getUsuario();
         
        	//cargar la vista del listado
        require_once '../../preguntas/view/pregunta/list.php';
    }

     public function resPreguntas($id=false){
        if(!Login::getUsuario())
            throw new Exception('Para poder ver las preguntas, debes de iniciar sesion');
            //Comprobar que llega el codigo
        if(!$id)
            throw new Exception("No se indico el Modulo");
        
        $modulos = Modulo::getModulo($id);
        $preguntas=Modulo::getModuloPreguntas($id);
        $respuestas=Respuesta::get();
        
        
            //cagar los usuarios
        $usuario=Login::getUsuario();
         
            //cargar la vista del listado
        require_once '../../preguntas/view/pregunta/resPreguntas.php';         
    }
    
    	//muestra un pregunta
    public function show($id=false){
        	//Comprobar que llega el codigo
        if(!$id)
            throw new Exception("No se indico el pregunta");
        
        	//Recupera el pregunta con dicho codigo
        $pregunta= Pregunta::getPregunta($id);

            //cagar los usuarios
        $usuario=Login::getUsuario();
        
        	//comprobar que el pregunta existe
        if(!$pregunta)
            throw new Exception("No existe el pregunta $id");
        
        	//cargar la vista de detalles
        require_once '../../preguntas/view/pregunta/details.php';
    }
    
    	//muestra el formulario de un pregunta
    public function create(){
        	//solo los administradores pueden listar preguntas
        // if(!Login::isAdmin())
        //     throw new Exception("Debes ser administrador");
        	//recupera la lista de modulos
        $modulos=Modulo::get();

            //cagar los usuarios
        $usuario=Login::getUsuario();

        require_once '../../preguntas/view/pregunta/form_new.php';
    }
    
    	//Guarda el nuevo pregunta
    public function store(){
        
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
        	//recibos el id del modulo
        $idModulo = intval($_POST['idModulo']);
        if($idModulo==0)
            throw new Exception("No eligio un Modulo");

        $enunciado = DB::escape($_POST['enunciado']);
        $dificultad = intval($_POST['dificultad']);
        $tipoRespuesta1 = isset($_POST['tipoRespuesta1'])?1:0;
        $tipoRespuesta2 = isset($_POST['tipoRespuesta2'])?1:0;
        $tipoRespuesta3 = isset($_POST['tipoRespuesta3'])?1:0;
        $tipoRespuesta4 = isset($_POST['tipoRespuesta4'])?1:0;
        $respuesta1 = DB::escape($_POST['respuesta1']);
        $respuesta2 = DB::escape($_POST['respuesta2']);
        $respuesta3 = DB::escape($_POST['respuesta3']);
        $respuesta4 = DB::escape($_POST['respuesta4']);

        
        	//crea el nuevo pregunta con los datos POST
        $pregunta = new Pregunta();
        $pregunta->enunciado=$enunciado;
        $pregunta->dificultad=$dificultad;
        
        $idPregunta = $pregunta->guardar($idModulo);

        if(!$idPregunta)  //guardar en la BDD
            throw new Exception("No se pudo guardar la pregunta:<br>$pregunta->enunciado");

        $respuestas = new Respuesta();
        $respuestas->texto = $respuesta1;
        $respuestas->correcta= $tipoRespuesta1;        

        if(!$respuestas->guardar($idPregunta))
            throw new Exception("No se pudo guardar la respuesta:<br>$respuestas->texto <br>pregunta id: $idPregunta <br>$tipoRespuesta1");

        $respuestas = new Respuesta();
        $respuestas->texto = $respuesta2;
        $respuestas->correcta= $tipoRespuesta2;        

        if(!$respuestas->guardar($idPregunta))
            throw new Exception("No se pudo guardar la respuesta:<br>$respuestas->texto");

        $respuestas = new Respuesta();
        $respuestas->texto = $respuesta3;
        $respuestas->correcta= $tipoRespuesta3;        

        if(!$respuestas->guardar($idPregunta))
            throw new Exception("No se pudo guardar la respuesta:<br>$respuestas->texto");

        $respuestas = new Respuesta();
        $respuestas->texto = $respuesta4;
        $respuestas->correcta= $tipoRespuesta4;        

        if(!$respuestas->guardar($idPregunta))
            throw new Exception("No se pudo guardar la respuesta:<br>$respuestas->texto");


            //cagar los usuarios
        $usuario=Login::getUsuario();
        
        	//muestra la vista de exito
        $mensaje = "Guardado Correcto de la pregunta: <br>$pregunta->enunciado";
        require_once '../../preguntas/view/exito.php';   //mostrar exito
    }

	//ACTUALIZAR SE HACE EN DOS PASOS
    	//muestra el formulario de edicion de un pregunta
    public function edit($id=false){
        	//comprobar que me llega un identificador
        if(!$id)
            throw new Exception("No se indico el pregunta");

        	//recuperar el pregunta con dicho codigo
        $editPregunta=Pregunta::getPregunta($id);        
        $editRespuestas=Respuesta::getRespuesta($id);

            //cagar los usuarios
        $usuario=Login::getUsuario();

        	//comprobar que el pregunta existe
        if(!$editPregunta)
            throw new Exception("No existe el pregunta $id");

        	//cargar la vista del formulario
        require_once '../../preguntas/view/pregunta/form_update.php';
    }

    	//aplica los cambio de un pregunta
    public function update(){
        if(empty($_POST['actualizar']))
            throw new Exception("No hay datos para Actualizar");
            var_dump($_POST);

            //cargamos los datos que me llegan por post de la pregunta
            //con sus respuestas
        $idPre = intval($_POST['id']);
        $upEnunciado = DB::escape($_POST['enunciado']);
        $upDificultad = intval($_POST['dificultad']);

        $idR1 = intval($_POST['idR1']);
        $idR2 = intval($_POST['idR2']);
        $idR3 = intval($_POST['idR3']);
        $idR4 = intval($_POST['idR4']);

        $resp1 = DB::escape($_POST['respuesta1']);
        $resp2 = DB::escape($_POST['respuesta2']);
        $resp3 = DB::escape($_POST['respuesta3']);
        $resp4 = DB::escape($_POST['respuesta4']);

        $tipoResp1 = isset($_POST['tipoRespuesta1'])?1:0;
        $tipoResp2 = isset($_POST['tipoRespuesta2'])?1:0;
        $tipoResp3 = isset($_POST['tipoRespuesta3'])?1:0;
        $tipoResp4 = isset($_POST['tipoRespuesta4'])?1:0;

            //creo la pregunta
        $upPregunta = new Pregunta();

            //guardo los datos en pregunta
        $upPregunta->id = $idPre;
        $upPregunta->enunciado = $upEnunciado;
        $upPregunta->dificultad = $upDificultad;
            
            //actualizo la pregunta
        if(!$upPregunta->actualizar())
            throw new Exception("No se pudo Actualizar!");
            
        // $pregunta = new Pregunta();   //nuevo pregunta
        // $pregunta->id=intval($_POST['id']);    //recupera el id via POST
        
        // $pregunta->enunciado=DB::escape($_POST['enunciado']);     //resto de campos
        // $pregunta->dificultad=DB::escape($_POST['dificultad']);        
        
        // if($pregunta->actualizar()===false)    //intenta actualizar
        //     throw new Exception("No se puede actulizar");

        // $this->show($pregunta->id);    //OPCION 3: detalles del pregunta actualizado
    }

    //ELIMINAR SE HACE EN DOS PASOS
    	//(si queremos formulario de confirmacion)

    	//muestra el formulario de confirmacion de eliminacion
    public function delete($id){
        	//comprobar que llega el identificador
        if(!$id)
            throw new Exception("No se indico la pregunta");

        	//recuperar el pregunta con dicho identificador
        $pregunta=Pregunta::getPregunta($id);

            //cagar los usuarios
        $usuario=Login::getUsuario();

        	//comprobar que el pregunta existe
        if(!$pregunta)
            throw new Exception("No existe la pregunta $id");

        	//ir al formulario de confirmacion
        require_once '../../preguntas/view/pregunta/confirm_delete.php';
    }

    	//elimina el pregunta
    public function destroy(){
        	//recupera el identicador via POST
        $id=intval($_POST['id']);

        if(!Pregunta::borrar($id))
            throw new Exception("No se pudo borrar");

        	//carga los usuarios
        $usuario=Login::getUsuario();
        
        	//mostrar la vista de exito
        $mensaje="Borrado correcto!";
        require_once '../../preguntas/view/exito.php';   //mostrar exito            
    }
}