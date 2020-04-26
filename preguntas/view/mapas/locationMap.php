<!DOCTYPE html>
<html>
<head>
	
	<title>Leaflet - Quick Start</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico"/> -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <link rel="stylesheet" type="text/css" href="/css/estilosMapa.css">
    <link rel="stylesheet" type="text/css" href="/css/templates.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
     <script type="text/javascript" src="/js/where.js"></script>
     <script type="text/javascript" src="/js/maps.js"></script>
     <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="/js/templates.js"></script>
</head>
<body onload="inicio()">
    <?=Template::login($usuario);			
	   Template::menu(); ?>
    <div class="container"> 
        <h2 class="titulo">Posicionado en el mapa, total son <span id="num"></span> el numero de Ips<br>Que ha visitado la pagina.</h2>      
        <div id="mapid1" style="width: 100%; height: 400px; border-radius: 10px"></div>
        <div id="cordenadas" class="lugares"></div>        
    </div>
</body>
</html>