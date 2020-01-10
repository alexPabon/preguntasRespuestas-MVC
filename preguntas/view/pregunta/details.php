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
  </head>
  <body>
    <?php       
      Template::login($usuario);
      Template::menu();
    ?>      
    <div class="contenido">

      <div class="marco">
        <h2>Detalles</h2>        
       	
      </div>
    </div>
    <?PHP Template::footer($usuario);?>
  </body>
</html>