<?php
class User{
    //operacion por defecto
    public function index(){
        $this->list();  //listado de usuarios        
    }
    
    //lista de usuarios
    public function list(){
        //debe tener privilegios
        if(!Login::privilegio(500))
            throw new Exception("No tienes privilegios");
        $fColumna='';
        $fBuscar='';
        if(!empty($_POST['filtro'])){
            $fColumna=DB::escape($_POST['filtro']);
            $fBuscar=DB::escape($_POST['busqueda']);
            $filtro=Usuario::getFiltered($fColumna,$fBuscar);
        }

        $usuarios=Usuario::get();   //recuperar la lista de usuarios
        $usuario=Login::getUsuario();        

        include 'view/usuario/list.php';
    }
    
    //muestra un usuario
    public function show($id=false){
        //comprobar que me llega el codigo
        if(!$id) throw new Exception("No se indico el usuario");
        //debe tener privilegios        
        //carga los usuarios    ******** asegurar entradas *************
        $usuario=Login::getUsuario(); 
        if(is_null($usuario))
            throw new Exception("No tienes Permisos");
        //comprobar que el $id es igual que el de la $_SESSION
        if($id!=$usuario->id)
            if(!Login::privilegio(500))
                throw new Exception("No tienes privilegiossss");
        
        //recuperar el usuario con dicho codigo
        $u=Usuario::getUsuario($id);
        
        //comprobar que el usuario existe
        if(!$u) throw new Exception("No existe el usuario $id");
        
        //recupera el usuario
        $usuario=Login::getUsuario();
        //cargar la vista de detalles
        include 'view/usuario/details.php';
    }

    //muestra el formulario de nuevo usuario
    public function create(){
         //solo los administradores pueden crear usuarios
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");                    
        
        //recupera el usuario
        $usuario=Login::getUsuario();    
        include 'view/usuario/form_new.php';
    }

    //Guarda el nuevo usuario
    public function store(){
       //solo los administradores pueden crear usuarios
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");            

        //crea el nuevo usuario con los datos POST
        $u = new Usuario();
        $u->user=DB::escape($_POST['user']);
        $u->password=md5($_POST['password']);
        $u->nombre=DB::escape($_POST['nombre']);
        $u->apellido1=DB::escape($_POST['apellido1']);
        $u->apellido2=DB::escape($_POST['apellido2']);
        
        if($u->user=="" || $u->password =="" || $u->nombre=="")
            throw new Exception("Todos los campos son obligatorios");
            
        if(Login::isAdmin()){
            $u->privilegio=intval($_POST['privilegio']);
            $u->administrador=empty($_POST['administrador'])?0:1;
        }
        
        $u->email=DB::escape($_POST['email']);
        
        if(!$u->guardar())  //guardar en la BDD
            throw new Exception("No se pudo guardar $u->user");
        
        //recupera el usuario
        $usuario=Login::getUsuario();
        //muestra la vista de exito
        $mensaje = "Guardado del Usuario $u->user correcto";
        include 'view/exito.php';   //mostrar exito
        header("Refresh:8; url=/");
    }

    //muestra el formulario de edicion de un usuario
    public function edit($id=false){                       
        //comprobar que me llega el identificador
        if(!$id) throw new Exception("No se indico el usuario");
         //carga los usuarios    ******** asegurar entradas *************
        $usuario=Login::getUsuario(); 
        if(is_null($usuario))
            throw new Exception("No tienes Permisos");
        //comprobar que el $id es igual que el de la $_SESSION
        if($id!=$usuario->id)
            if(!Login::isAdmin())   //si no es administrador
                throw new Exception('Intentas hacer algo que NO es correcto!');

        //recuperar el usuarioa
        $u=Usuario::getUsuario($id);
        
        //cargar la vista del formulario
        include 'view/usuario/form_update.php';        
    }

    //aplica los cambios de un usuario
    public function update(){
        if(empty($_POST['id'])) throw new Exception("No existe el usuario");
        $id=intval($_POST['id']);       //recupera el id via POST

       //carga los usuarios    ******** asegurar entradas *************
        $usuario=Login::getUsuario(); 
        if(is_null($usuario))
            throw new Exception("No tienes Permisos");
        //comprobar que el $id es igual que el de la $_SESSION
        if($id!=$usuario->id)
            if(!Login::isAdmin())   //si no es administrador
                throw new Exception('Intentas hacer algo que NO es correcto!');

        $u=Usuario::getUsuario($id);    //recupera el usuario

        if(!$u) throw new Exception("No existe el usuario");

        $u->user=DB::escape($_POST['user']);       
        $u->nombre=DB::escape($_POST['nombre']);
        $u->apellido1=DB::escape($_POST['apellido1']);
        $u->apellido2=DB::escape($_POST['apellido2']);
        
        if(Login::isAdmin()){       //solo los administradores actualiza estos campos
            $u->privilegio=intval($_POST['privilegio']);
            $u->administrador=empty($_POST['administrador'])?0:1;
        }

        $u->email=DB::escape($_POST['email']);

        //el password solamente se cambia si se indica uno nuevo
        if(!empty($_POST['password'])) $u->password=md5($_POST['password']);

        if($u->actualizar()===false) throw new Exception("No se puede actualizar");

        $this->show($u->id);    //detalles del usuario editado        
    }

    //muestra el formulario de confirmacion de eliminacion
    public function delete($id){
        //comprobar que me llega el identificador
        if(!$id) throw new Exception("No se indico el usuario");

        //carga los usuarios    ******** asegurar entradas *************
        $usuario=Login::getUsuario();
        if(is_null($usuario))
            throw new Exception("No tienes Permisos");
        //comprobar que el $id es igual que el de la $_SESSION
        if($id!=$usuario->id)
            if(!Login::isAdmin())   //si no es administrador
                throw new Exception('Intentas hacer algo que NO es correcto!');

        //recupera el usuario con dicho identificador
        $u=Usuario::getUsuario($id);

        //comprobar que el usuario existe
        if(!$u) throw new Exception("No existe el usuario $id");
       
        //ir al formulario de confirmacion
        include 'view/usuario/confirm_delete.php';
        header("Refresh:15; url=/");      
    }

    //elimina el usuario
    public function destroy(){
        if(empty($_POST['id'])) throw new Exception("Intentas entrar sin un formulario");
        //recuperar el identificador via POST
        $id=intval($_POST['id']);            

        //carga los usuarios    ******** asegurar entradas *************
        $usuario=Login::getUsuario();
        if(is_null($usuario))
            throw new Exception("No tienes Permisos");
        //comprobar que el $id es igual que el de la $_SESSION
        if($id!=$usuario->id)
            if(!Login::isAdmin())   //si no es administrador
                throw new Exception('Intentas hacer algo que NO es correcto!');

        if(!Usuario::borrar($id))
            throw new Exception("No se pudo borrar");
        
        //mostrar la vista de exito
        $mensaje="Borrado correcto!";
        include 'view/exito.php';
        header("Refresh:8; url=/");           
    }

    public function regi(){
           //recupera el usuario
        $usuario=Login::getUsuario(); 
        if($usuario)
            header('location:/'); 
        include 'view/usuario/registrar.php';
    }

    public function registrar(){
        if(empty($_POST['user'])) throw new Exception("Intentas entrar sin un formulario");
        //recupera los usuarios
        $usuario=Login::getUsuario();
        //crea el nuevo usuario con los datos POST
        $u = new Usuario();
        $u->user=DB::escape($_POST['user']);
        $u->password=md5($_POST['password']);
        $u->nombre=DB::escape($_POST['nombre']);
        $u->email=DB::escape($_POST['email']);
        
        if(!$u->guardar())  //guardar en la BDD
            throw new Exception("No se pudo guardar $u->user");

        $mensaje = "Guardado del Usuario $u->user correcto <br>Ya puedes ingresar con tu Usuario y contraseña";
        include 'view/exito.php';   //mostrar exito

        header("Refresh:5; url=/");
        die("<h1 style='text-align: center; margin-top: 40px;'>Redirigiendo a la portada....</h1>"); 
   }
}