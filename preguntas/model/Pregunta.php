<?php
class Pregunta{
    //PROPIEDADES
    public $id=0, $enunciado='',$dificultad=0, $publicacion='';
    
    //METODOS DEL CRUD
    //recuperar todos las pregunta
    public static function get():array{
        $consulta="SELECT m.id AS idModulo, m.codigo, m.nombre, p.id AS idPregunta, p.enunciado
					FROM modulos m
						INNER JOIN preguntas_modulos pm ON m.id=pm.idModulo
				        INNER JOIN preguntas p ON pm.idPregunta=p.id";   //preparar la consulta
        return DB::selectAll($consulta,'Pregunta');
    }
    
    //recuperar una accion en concreto por id
    public static function getPregunta(int $id=0):?Pregunta{
        $consulta="SELECT * FROM preguntas WHERE id=$id";   //preparar la consulta
        return DB::select($consulta,'Pregunta');        //ejecutar y retornar el resultado
    }
    
    //Guardar
    public function guardar(int $idModulo){
        $consulta = "INSERT INTO preguntas(enunciado,dificultad)
                        VALUES('$this->enunciado','$this->dificultad')";
        $id = DB::insert($consulta);
           
            //segunda consulta: inserta la relación entre módulo y acción
            $consulta = "INSERT INTO preguntas_modulos(idModulo, idPregunta)
                   VALUES($idModulo,$id)";
            
            DB::insert($consulta);

            return $id; 
                            
    }
    
    //Borrar
    public static function borrar(int $id){
        $consulta="DELETE FROM preguntas WHERE id=$id";
        return DB::delete($consulta);
    }
    
    //Actualizar un pregunta
    public function actualizar(){
        $consulta="UPDATE preguntas SET
                        enunciado='$this->enunciado',
                        dificultad='$this->dificultad'                                            
                    WHERE id=$this->id";
        return DB::update($consulta);
    }

    //filtrar por enunciado
    public static function getPreguntaPorEnunciado(string $enunciado=''):array{
        $consulta="SELECT * FROM preguntas
                    WHERE enunciado LIKE '%$enunciado%'";

        return DB::selectAll($consulta,'Pregunta');
    }
    
    //__toString()
    public function __toString():string{
        return "$this->id $this->enunciado $this->dificultad $this->publicacion";
    }
}
