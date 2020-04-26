<?php
    // var_dump($allips);
    $ips = '';
    $cont =0;
        // recorre el array con las ips ordenas y sin repetirse
    foreach ($distinticIp as $key => $value) {
        $contador = 0;
        $date = '';
        $country = '';
        $city = '';
        $ipInitial = $value->numeroIp;
        
        $ips .= "<tr class='rows'>";
        $ips .= "<td class='numero'>".++$cont."</td>";
        $ips .= '<td>'.$value->numeroIp.'</td>';

            // Cuenta cuantas veces se repite la ip
        foreach ($allips as $key => $valueip) {
            $ipSecond = $valueip->numeroIp;
            $dateSecond = $valueip->created_at;
            
            if($ipInitial==$ipSecond){
                $contador++;
                if($date<$dateSecond)
                    $date=$dateSecond;
            }
        }
            // Encuentra el nombre del pais y la ciudad con el Nº ip
        foreach($fileList as $file){
            $ipThird = $file->query;
            if($ipInitial==$ipThird){
                $country = $file->country;
                $city = $file->city;
                break;
            }
        }
        
        $ips .= '<td>'.$country.'</td>';
        $ips .= '<td>'.$city.'</td>';
        $ips .= '<td>'.$contador.'</td>';
        $ips .= '<td>'.$date.'</td>';
        $ips .= '</tr>';
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Listado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/templates.css">
        <link rel="stylesheet" type="text/css" href="/css/estilosMapa.css"> 
        <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/js/templates.js"></script>       
    </head>
    <body>
        <?=Template::login($usuario);			
	       Template::menu();?>
        <div class="container"> 
            <h1>listado de las ips que visitan el sitio</h1>
            <table class="table">
                <tr class="tbHeader">
                    <th>Nº</th>
                    <th>Numero IP</th>
                    <th>Pais</th>
                    <th>Ciudad</th>
                    <th>Visto</th>
                    <th>Ultimo acceso</th>
                </tr>                
                <?=$ips?>
            </table>
        </div>
    </body>
</html>