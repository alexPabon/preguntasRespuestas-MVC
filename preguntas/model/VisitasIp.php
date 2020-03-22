<?php
class VisitasIp{
	//PROPIEDADES
    public $id=0, $numeroIp='', $clase='';

    //Guardar
    public function guardar(){
        $consulta = "INSERT INTO consultasip(id, numeroIp , clase, created_at, updated_at)
						VALUES(DEFAULT, '$this->numeroIp' ,'$this->clase', current_timestamp,current_timestamp)";
        return DB::insert($consulta);

    }
}