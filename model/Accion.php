<?php
class Accion{
    //PROPIEDADES
    public $id=0, $codigo='', $nombre='', $descripcion='', $objetivos='',
    $nivel=0, $requisitos='';
    
    //METODOS DEL CRUD
    //recuperar todos los accion
    public static function get():array{
        $consulta="SELECT * FROM acciones";   //preparar la consulta
        return DB::selectAll($consulta,'Accion');
    }
    
    //recuperar una accion en concreto por id
    public static function getAccion(int $id):?Accion{
        $consulta="SELECT * FROM acciones WHERE id=$id";   //preparar la consulta
        return DB::select($consulta,'Accion');        //ejecutar y retornar el resultado
    }

    //recupera los modulos de cada accion
    public function modulos(){
        $consulta="SELECT * FROM modulos_acciones ma 
                            INNER JOIN modulos m ON ma.idModulo=m.id 
                            WHERE idAccion=$this->id";
        
        return DB::selectAll($consulta, 'Modulos');
    }
    
    //Guardar
    public function guardar(){
        $consulta = "INSERT INTO acciones(codigo,nombre,descripcion,objetivos,nivel,requisitos)
                        VALUES('$this->codigo','$this->nombre','$this->descripcion','$this->objetivos', '$this->nivel','$this->requisitos')";
        return DB::insert($consulta);
    }
    
    //Borrar
    public static function borrar(int $id){
        $consulta="DELETE FROM acciones WHERE id=$id";
        return DB::delete($consulta);
    }
    
    //Actualizar un accion
    public function actualizar(){
        $consulta="UPDATE acciones SET
                        codigo='$this->codigo',
                        nombre='$this->nombre',
                        descripcion='$this->descripcion',
                        objetivos='$this->objetivos',
                        nivel='$this->nivel',
                        requisitos='$this->requisitos'                       
                    WHERE id=$this->id";
        return DB::update($consulta);
    }

    public static function getAccionPorNombre(string $nombre=''):array{
        $consulta="SELECT * FROM acciones
                    WHERE nombre LIKE '%$nombre%'";

        return DB::selectAll($consulta,'Accion');
    }
    
    //__toString()
    public function __toString():string{
        return "$this->id $this->codigo $this->nombre $this->descripcion $this->objetivos $this->nivel $this->requisitos";
    }
}