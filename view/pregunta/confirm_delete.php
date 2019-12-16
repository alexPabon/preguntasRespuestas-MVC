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
   		<h2>Confirmar borrado</h2>

		<p>Confirmar el borrado de la respuesta:<br><?=$respuesta->texto?></p>
		<form method="post" action="/respuestas/destroy">
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="submit" name="confirmarborrado" value="Borrar Libro">
		</form>
		<p><a href="/respuestas/list">Volver al listado</a></p>                                       
      </div>
    </div>
    <?PHP Template::footer($usuario);?>
  </body>
</html>