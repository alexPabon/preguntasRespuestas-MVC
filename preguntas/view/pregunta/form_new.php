<?php
  $verModulos='';
  foreach ($modulos as $value)
    $verModulos .= "<option value='$value->id'>$value->nombre</option>";

  if(isset($_POST['enunciado']))
    var_dump($_POST);
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
        <h2>Formulario para una nueva pregunta</h2>        
        <form method="post" action="/query/store">
          <ol class="nuevaPregunta">
            <li>
              <label>Seleccione un Modulo:</label>
              <select name="idModulo">
                <option selected disabled>--------</option>
                <?=$verModulos ?>
              </select>
            </li>
            <li>
              <label>Enunciado</label>
              <textarea class="texto" name="enunciado"></textarea>
            </li>
            <li>
              <label>Nivel Dificultad: </label>
              <select class="nivelDificultad" name="dificultad">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </li>
            <li>
              <label for="respuesta1">Respuesta 1</label>
              <input type="checkbox" name="tipoRespuesta1" value="1">
              <label>Verdadera</label>
              <input type="text" class="entradas" id="respuesta1" name="respuesta1">              
            </li>
            <li>
              <label for="respuesta2">Respuesta 2</label>
              <input type="checkbox" name="tipoRespuesta2" value="1">
              <label>Verdadera</label>
              <input type="text" class="entradas" id="respuesta2" name="respuesta2">              
            </li>
            <li>
              <label for="respuesta3">Respuesta 3</label>
              <input type="checkbox" name="tipoRespuesta3" value="1">
              <label>Verdadera</label>
              <input type="text" class="entradas" id="respuesta3" name="respuesta3">              
            </li>
            <li>
              <label for="respuesta4">Respuesta 4</label>
              <input type="checkbox" name="tipoRespuesta4" value="1">
              <label>Verdadera</label>
              <input type="text" class="entradas" id="respuesta4" name="respuesta4">              
            </li>            
          </ol>         
          <input type="submit" name="guardar" value="Guardar Pregunta">
        </form>
      </div>
    </div>
    <?PHP Template::footer($usuario);?>
  </body>
</html>