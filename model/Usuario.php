<?php
class Usuario{
    //PROPIEDADES
    public $id=0, $user='', $password='', $nombre='',$apellido1='',
            $apellido2='', $privilegio=0, $administrador=0, $email='',$imagen='',
            $create_at='', $update_at='';
    
    //IDENTIFICACION DEL USUARIO
    //permitiremos la identificacion por email o usuario
    public static function identificar(string $user='', string $password=''):?Usuario{
        $consulta="SELECT * FROM usuarios
                    WHERE (user='$user' OR email='$user') AND password='$password'";
        return DB::select($consulta,self::class);   //conectar y ejecutar la consulta        
    }
    
    //METODOS DEL CRUD
    //recupera todos los usuarios
    public static function get():array{
        $consulta="SELECT * FROM usuarios";     //preparar la consulta
        return DB::selectAll($consulta, self::class);
    }
    
    //recuperar un usuarios concreto por id
    public static function getUsuario(int $id):?Usuario{
        //preparar la consulta
        $consulta="SELECT * FROM usuarios WHERE id=$id";
        return DB::select($consulta, self::class);
    }
    
    //recuperar usuarios con un filtro avanzado
    public static function getFiltered(string $campo='user',string $valor='', string $orden='id',
                                        string $sentido='ASC'):array{
        $consulta="SELECT * FROM usuarios WHERE $campo LIKE '%$valor%'
                    ORDER BY $orden $sentido";
        return DB::selectAll($consulta, self::class);   //conectar y ejecutar
    }
    
    //insertar un nuevo usuario
    public function guardar(){
        //preparar consulta
        $consulta="INSERT INTO usuarios(user,password,nombre,apellido1,apellido2,privilegio, administrador, email)
                    VALUES('$this->user', '$this->password', '$this->nombre', '$this->apellido1',
            '$this->apellido2', $this->privilegio, $this->administrador, '$this->email')";

        return DB::insert($consulta);   //conectar y ejecutar
    }

    //actualizar un usuario
    public function actualizar(){
        //prepare consulta
        $consulta="UPDATE usuarios SET
                        user = '$this->user',
                        password = '$this->password',
                        nombre = '$this->nombre',
                        apellido1 = '$this->apellido1',
                        apellido2 = '$this->apellido2',
                        privilegio = $this->privilegio,
                        administrador = $this->administrador,
                        email = '$this->email'
                    WHERE id=$this->id";

        return DB::update($consulta);
    }

    //Borrar un usuario existente
    public static function borrar(int $id){
        //preparar consulta
        $consulta="DELETE FROM usuarios WHERE id=$id";

        //ejecutar consulta
        return DB::delete($consulta);
    }

    //__toString
    public function __toString():string{
        return "$this->id $this->user $this->nombre $this->apellido1 $this->email $this->created_at";
    }
}