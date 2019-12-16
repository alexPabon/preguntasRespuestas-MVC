<?php
  $listaPreguntas='';
  $contPregunta = 0;
  $respuestaCorrecta=[];
  $numeroPreguntasss = count($preguntas);
  shuffle($preguntas);
  // shuffle($respuestas);  

  foreach ($modulos as $modul){
    $idModulo = $modul->id;
    $listaPreguntas.="<div class='marcoModulos'>";
      $listaPreguntas.= "<h2 class='modulos'>".$modul->codigo.": ".$modul->nombre."</h2>";
      $listaPreguntas.="<div class='contP'>";
        $listaPreguntas.="<form method='post' name='modul_".$idModulo."' class='formModulos' id='modul_".$idModulo."'>";    
          $listaPreguntas.= "<ol type='1' class='lisPreguntas'>";
            foreach($preguntas as $preg){
              $idPregta = $preg->idPregunta;
              $numeroPregunta= 'p'.$contPregunta;
              if($idModulo==$preg->idModulo){
                $listaPreguntas.= "<li id='".$numeroPregunta."' class='preguntas'>";
                  $listaPreguntas.= htmlspecialchars($preg->enunciado);
                  if(Login::isAdmin()){                    
                    $listaPreguntas.= "<a class='resp' href='/query/edit/".$idPregta."'>Editar</a>";
                    $listaPreguntas.= "<a class='resp' href='/query/delete/'>Borrar</a>";
                  }          
                $listaPreguntas.="</li>";
                $contPregunta++;
                $listaPreguntas.="<ol type='a'>";
                $contResp=0;
                  foreach ($respuestas as $resp){
                    $numeroResp="r".$contResp;
                    if($idPregta== $resp->idPregunta){
                      $listaPreguntas.="<li id='".$numeroResp.$numeroPregunta."' class='respuestas'>";
                      $listaPreguntas.="<input type='radio' name='".$numeroPregunta."' value='".$numeroResp."'>";
                        $listaPreguntas.=htmlspecialchars($resp->texto);                    
                        if($resp->correcta){
                          if(Login::isAdmin())
                            $listaPreguntas.="  <b>---CORRECTA!</b>";

                          array_push($respuestaCorrecta, ["modul_".$idModulo, $numeroPregunta, $numeroResp]);
                        }
                      $listaPreguntas.="</li>";
                      $contResp++;
                    }              
                  }
                $listaPreguntas.="</ol>";          
              }                
            }      
          $listaPreguntas.="</ol>";
          $listaPreguntas.="<input type='submit' value='Comprobar las Respuestas'>";    
        $listaPreguntas.="</form>";
        $listaPreguntas.="<div id='resModul_".$idModulo."'></div>";
      $listaPreguntas.="</div>";
    $listaPreguntas.="</div>";
  }     
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Modulos con Preguntas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/ampliada.css">
    <link rel="stylesheet" type="text/css" href="/css/templates.css">
    <link rel="stylesheet" type="text/css" href="/css/preguntas.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/templates.js"></script>
    <script type="text/javascript" src="/js/preguntas.js"></script>
    <script type="text/javascript">
        // recuperamos el arrya que nos llega por php y lo hacemos visible para javascript
      var resp= <?php echo json_encode($respuestaCorrecta);?>
    </script>
  </head>
  <body>
    <?php       
      Template::login($usuario);
      Template::menu();
    ?>      
    <div class="contenido">

      <div class="marco">
        <h2>Listado de Modulos con sus Preguntas</h2>        
        <?=$listaPreguntas;?>                               
      </div>
    </div>
    <?PHP Template::footer($usuario);?>
  </body>
</html>