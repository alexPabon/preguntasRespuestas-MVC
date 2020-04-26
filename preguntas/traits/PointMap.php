<?PHP

// realiza una consulta a la api, enviando la direccion Ip, para que
// nos devuelva las cordenadas

trait PointMap{

    /**
     * Realiza peticion a la API
     * 
     * @param string $ip
     * @return array $loc
     */
    protected static function apiResponse($ip):array{
        
        // Cuando se realiza muchas consultas a la api, se genera un warning
        // Notificar todos los errores excepto E_NOTICE
        error_reporting(E_ALL ^ E_WARNING);
        $loc = [];

        $url = 'http://ip-api.com/json/'.$ip;
        $ipMap_json = file_get_contents($url);
        $ipMap_array = json_decode($ipMap_json);
        if($ipMap_array && isset($ipMap_array->lat)){
            $loc['lat']=$ipMap_array->lat;
            $loc['lon']=$ipMap_array->lon;
            $loc['city']=$ipMap_array->city;
            $loc['zip']=$ipMap_array->zip;
            $loc['country']=$ipMap_array->country;
            $loc['query']=$ipMap_array->query;            

            return $loc;
        }
        return $loc;
    }    
}
