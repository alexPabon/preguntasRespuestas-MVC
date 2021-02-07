<?php
// Modelo para realizar consultas en la tabla de consultasips en la BDD

class ConsultaIps{
    //PROPIEDADES
    public $id=0, $numeroIp='', $clase='';    
    
    public static function get(){
        $consulta = "SELECT DISTINCT numeroIp FROM consultasips
                        ORDER BY created_at DESC";

        return DB::selectAll($consulta,'ConsultaIps');        
    }

    public static function getAll():array{
        $consulta = "SELECT numeroIp, created_at FROM consultasips
                        ORDER BY numeroIp DESC";

        return DB::selectAll($consulta,'ConsultaIps');        
    }
    
    //Guardar
    public function guardar(){
        $consulta = "INSERT INTO consultasips(id, numeroIp , clase, created_at, updated_at)
						VALUES(DEFAULT, '$this->numeroIp' ,'$this->clase', current_timestamp,current_timestamp)";
        return DB::insert($consulta);
    }
}