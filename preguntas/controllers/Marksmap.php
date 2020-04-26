<?php
// Controlador para obtener los puntos en el mapa

class Marksmap{
    use PointMap, SavePlaces;
    
    /**
    *llama a metodo protegido actualizar
    *
    *redirecciona al mapa
    *
    *@return void
    */
    public function index(){      
    
            //solo los administradores pueden crear usuarios
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
        
        $this->mapa();        
    }        

    public function mapa(){
            //solo los administradores pueden crear usuarios
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
        
            //recupera el usuario
        $usuario=Login::getUsuario();
        include '../../preguntas/view/mapas/locationMap.php';
    }

    public function list(){
            //solo los administradores pueden crear usuarios
        if(!Login::isAdmin())
            throw new Exception("Debes ser administrador");
        
        $distinticIp = ConsultaIps::get();
        $allips = ConsultaIps::getAll();
        $fileList = self::readFile();

            // para eliminar el cache y refresque los cambios.
        // header("Cache-Control: no-cache, must-revalidate");
        // header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        // header("Content-Type: application/xml; charset=utf-8");
        
        //recupera el usuario
        $usuario=Login::getUsuario();
        
        include '../../preguntas/view/mapas/verlista.php';
    }

    /**
    *Solicita el listado de las ips
    *pide las cordenadas en cargarDatos($p)
    *envia los datos para ser guardados
    *
    *@return vacio
    */    
    public function actualizar(){
        $distinticIp = ConsultaIps::get();        
        self::cargarDatos($distinticIp);                       
        $guardarJS = self::saveFile($distinticIp);
        
        if(!$guardarJS)
            throw new Exception("Ocurrio un error al guardar los datos en el fichero");

        header('location: /');
    }

    /**
     * recorre el array para consultar en la api
     * @param Array $datos
     * @return Array 
     */
    protected static function cargarDatos(array $datos){
                
        $location =[];        
        $contador = 0;
        
        foreach ($datos as $value) {
            if(!self::checkIp($value->numeroIp)){
                $coordinates = self::apiResponse($value->numeroIp);
                if(!empty($coordinates)){                
                    self::saveCity($coordinates);

                    $location[] = $coordinates;
                    $contador++;
                } 
            
                if($contador>45)
                    break;
            }
        }                
    }
}