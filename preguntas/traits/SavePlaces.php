<?php

trait SavePlaces{
    /**
     * Convierte el array en json y lo guarda en el fichero
     * 
     * @param array $datos
     * @return boolean
     */
    protected static function saveFile(array $datos):bool{
        $file = '../../public_html/public/js/where.js';
        $dataFilter = self::comprobarIps($datos);
        file_put_contents($file,'var queryData=[]');

        if(is_readable($file)){
            $json = json_encode($dataFilter);
            $save = 'var queryData ='.$json;
            $file = fopen($file,'w');            
            fwrite($file,$save);
            fclose($file);
            return true;
        }
        return false;
    }
    
    protected static function saveCity(array $dato):bool{
        $existIp = self::checkIp($dato['query']);        
        $file = '../../preguntas/storage/cities.txt';
        $newFile = '';

        $contentSave['query']= $dato['query'];
        $contentSave['country']= $dato['country'];
        $contentSave['city']= $dato['city'];
        $contentSave['zip']= $dato['zip'];
        $contentSave['lat']= $dato['lat'];
        $contentSave['lon']= $dato['lon'];
        
        if(is_readable($file)){                       
            
            if(!$existIp){
                $contentFile = self::readFile();               
                $contentFile[]=$contentSave;
                
                foreach($contentFile as $value){
                    $json = json_encode($value);
                    $newFile .= $json.'!';
                }
                
                file_put_contents($file,$newFile);

                return true;
            }                                  
        }    
        return false;   
    }

    protected static function checkIp($ip):bool{
        $existIp = False;
        $contentFile = self::readFile();           

        foreach($contentFile as $content){                
            if($ip==$content->query){
                $existIp = true;
                break;
            }
        }
        return $existIp;
    }

    protected static function readFile():array{
        $file = '../../preguntas/storage/cities.txt';
        $contentFile = [];
                
        if(is_readable($file)){
            $file = fopen($file,'r');
            $li ='';
            
            while($linea = fgets($file)){
                $li = preg_split('[!]',$linea);                
                foreach($li as $value)
                    if(!empty($value))
                        $contentFile[]= json_decode($value);
            }

            fclose($file);            
        }        
        return $contentFile;
    }

    protected static function comprobarIps(array $datos):array{
        $content =[];
        $readFile = self::readFile();
        foreach($datos as $dato){
            $ip = $dato->numeroIp;

            foreach($readFile as $value)
                if($ip==$value->query)
                    $content[] = $value;
        }
        
        return $content;
    }
}