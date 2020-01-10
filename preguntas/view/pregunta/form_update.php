<?php
  $cont = 0;
  $todasRespuestas = "<ol class=''>";  

    foreach($editRespuestas as $resp){
      $cont++;
      $todasRespuestas.='<li>';
        $todasRespuestas.="<input type='hidden' name='idR".$cont."' value='".$resp->id."'>";
        $todasRespuestas.="<label for='respuesta".$cont."'>Respuesta ".$cont."</label>";
        $todasRespuestas.="<input type='checkbox'".($resp->correcta?'checked':'')." name='tipoRespuesta".$cont."' value='1'>";
        $todasRespuestas.="<label>Verdadera</label>";
        $todasRespuestas.="<input type='text' class='entradas' id='respuesta".$cont."' name='respuesta".$cont."' value='".$resp->texto."'>";
      $todasRespuestas.='</li>';
    }

  $todasRespuestas.='</ol>';


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Modulos con Preguntas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/ampliada.css">
    <link rel="stylesheet" type="text/css" href="/css/templates.css">
    <link rel="stylesheet" type="text/css" href="/css/preguntas.css">    
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/templates.js"></script>
    <script type="text/javascript" src="/js/preguntas.js"></script>   
  </head>
  <body>
     <?php       
      Template::login($usuario);
      Template::menu();
    ?>          
    <div class="contenido">

      <div class="marco">
        <h2>Listado de Modulos con sus Preguntas</h2>        
        <?php 
          // var_dump($editPregunta);
          // var_dump($respuestas);
        ?>
        <form method="post" action="/query/update">
          <label>Enunciado</label>
          <input type="text" name="id" value="<?= $editPregunta->id ?>">
          <textarea class="texto" name="enunciado"><?= $editPregunta->enunciado ?></textarea>
          <label>Nivel Dificultad: </label>
          <select class="nivelDificultad" name="dificultad">
            <option value="1" <?=($editPregunta->dificultad== '1' )?'selected':''?>>1</option>
            <option value="2" <?=($editPregunta->dificultad== '2' )?'selected':''?>>2</option>
            <option value="3" <?=($editPregunta->dificultad== '3' )?'selected':''?>>3</option>
            <option value="4" <?=($editPregunta->dificultad== '4' )?'selected':''?>>4</option>
            <option value="5" <?=($editPregunta->dificultad== '5' )?'selected':''?>>5</option>
          </select>
          <?= $todasRespuestas ?>

          <input type="submit" name="actualizar" value="Actualizar">
        </form> 

      </div>
    </div>
    <?PHP Template::footer($usuario);?>
  </body>
</html>