<?php
class Modulo{
    //PROPIEDADES
    public $id=0, $codigo='',$nombre='',$horas=0;
    
    //METODOS DEL CRUD
        //recuperar todos los modulo
    public static function get():array{
        $consulta="SELECT a.id AS idAccion, a.codigo AS codigoAcc, a.nombre AS nombreAcc,m.* 
					FROM acciones a 
						INNER JOIN modulos_acciones md ON a.id=md.idAccion
					    RIGHT JOIN modulos m ON idModulo= m.id";   //preparar la consulta
        return DB::selectAll($consulta,'Modulo');
    }

       //recuperar los modulos
    public static function getSoloModulos():array{
        $consulta="SELECT * FROM modulos";          //preparar la consulta
        return DB::selectAll($consulta,'Modulo');        //ejecutar y retornar el resultado
    }

        //recuperar un modulo en concreto por id
    public static function getModulo(int $id=0):?Modulo{
        $consulta="SELECT * FROM modulos WHERE id=$id";   //preparar la consulta
        return DB::select($consulta,'Modulo');        //ejecutar y retornar el resultado
    }

    public static function getModuloPreguntas(int $id=0):array{
        $consulta ="SELECT m.id AS idModulo, p.id,p.enunciado, r.idPregunta,r.texto,r.correcta
                    FROM modulos m
                        INNER JOIN preguntas_modulos pm ON m.id = pm.idModulo
                        INNER JOIN preguntas p ON pm.idPregunta = p.id
                        INNER JOIN respuestas r ON p.id = r.idPregunta
                    WHERE m.id = $id";
        return DB::selectAll($consulta,'Modulo');
    }

      //recuperar los modulos correspondientes a una accion
    public static function getAccionModulos(int $id):array{
        $consulta="SELECT a.id AS idAccion, a.codigo AS codigoAcc, a.nombre AS nombreAcc,m.* 
                    FROM acciones a 
                        INNER JOIN modulos_acciones md ON a.id=md.idAccion
                        RIGHT JOIN modulos m ON idModulo= m.id
                    WHERE a.id= $id";   //preparar la consulta
        return DB::selectAll($consulta,'Modulo');
    }
    
    
    
        //Guardar
    public function guardar(int $idAccion){
        $consulta = "INSERT INTO modulos(codigo,nombre,horas)
                        VALUES('$this->codigo','$this->nombre','$this->horas')";
        $id = DB::insert($consulta);
           
                //segunda consulta: inserta la relación entre módulo y acción
            $consulta = "INSERT INTO modulos_acciones(idAccion, idModulo)
                   VALUES($idAccion,$id)";
            
            DB::insert($consulta);

            return $id; 
                            
    }
    
        //Borrar
    public static function borrar(int $id){
        $consulta="DELETE FROM modulos WHERE id=$id";
        return DB::delete($consulta);
    }
    
        //Actualizar un modulo
    public function actualizar(){
        $consulta="UPDATE modulos SET
                        codigo='$this->codigo',
                        nombre='$this->nombre',
                        horas='$this->horas'                       
                    WHERE id=$this->id";
        return DB::update($consulta);
    }

        //filtrar por nombre
    public static function getModuloPorNombre(string $nombre=''):array{
        $consulta="SELECT * FROM modulos
                    WHERE nombre LIKE '%$nombre%'";

        return DB::selectAll($consulta,'Modulo');
    }
    
        //__toString()
    public function __toString():string{
        return "$this->id $this->codigo $this->nombre $this->horas";
    }
}
