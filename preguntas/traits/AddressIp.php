<?php

trait AddressIp{

	public static function guardarIp(){
		$direccionIP = $_SERVER['REMOTE_ADDR'];
        $nombreModulo = $_SERVER['REQUEST_URI'];

        $saveIp = new ConsultaIps();
        $saveIp->numeroIp = $direccionIP;
        $saveIp->clase = $nombreModulo;

        if(!$saveIp->guardar())  //guardar en la BDD
            throw new Exception("Se produjo un Error");
	}
}