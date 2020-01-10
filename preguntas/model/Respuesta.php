<?php
class Respuesta{
    //PROPIEDADES
    public $id=0, $texto='',$correcta=0, $idPregunta=0;
    
    //METODOS DEL CRUD
    //recuperar todos los respuestas
    public static function get():array{
        $consulta="SELECT * FROM respuestas";   //preparar la consulta
        return DB::selectAll($consulta,'Respuesta');
    }
    
    //recuperar una accion en concreto por id
    public static function getRespuesta(int $id=0):array{
        $consulta="SELECT * FROM respuestas WHERE idPregunta=$id";   //preparar la consulta
        return DB::selectAll($consulta,'Respuesta');        //ejecutar y retornar el resultado
    }
    
    //Guardar
    public function guardar(int $idPregunta){
        $consulta = "INSERT INTO respuestas(texto,correcta,idPregunta)
                        VALUES('$this->texto','$this->correcta',$idPregunta)";

        $id = DB::insert($consulta);             

        return $id;                             
    }
    
    //Borrar
    public static function borrar(int $id){
        $consulta="DELETE FROM respuestas WHERE id=$id";
        return DB::delete($consulta);
    }
    
    //Actualizar un respuestas
    public function actualizar(){
        $consulta="UPDATE respuestas SET
                        texto='$this->texto',
                        correcta='$this->correcta'                                            
                    WHERE id=$this->id";
        return DB::update($consulta);
    }

    //filtrar por texto
    public static function getRespuestaPorTexto(string $texto=''):array{
        $consulta="SELECT * FROM respuestas
                    WHERE texto LIKE '%$texto%'";

        return DB::selectAll($consulta,'Respuesta');
    }
    
    //__toString()
    public function __toString():string{
        return "$this->id $this->texto $this->correcta $this->idPregunta";
    }
}
