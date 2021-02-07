<!DOCTYPE html>
<html>
	<head>
		<title>Portada</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
		<link rel="stylesheet" type="text/css" href="/css/templates.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="/js/templates.js"></script>

	</head>
	<body lang="es">
		<?php
			Template::login($usuario);		
			Template::menu();
		?>				
		<div class="contenido">
			<div class="marco">
				<h1>Aplicación para resolver diferentes test de preguntas</h1>
				<h2>Modelo Vista Controlador (MVC) con controlador frontal</h2>
				<p>
					Esta aplicación se realizó con la arquitectura de <b>Modelo Vista Controlador (MVC)</b> con 	<b>Controlador frontal</b>, que consiste en separar los datos de una aplicación, la interfaz de 	usuario, y la lógica de control en tres componentes distintos.<br><br>
					Se trata de un modelo muy maduro y que ha demostrado su validez a lo largo de los años en todo 	tipo de aplicaciones, y sobre multitud de lenguajes y plataformas de desarrollo.
				</p>
				<ul>
					<li>El <b>Modelo</b> que contiene una representación de los datos que maneja el sistema, su 		lógica de negocio, y sus mecanismos de persistencia.</li>
					<li>La <b>Vista</b>, o interfaz de usuario, que compone la información que se envía al cliente y 		los mecanismos interacción con éste.</li>
					<li>El <b>Controlador</b>, que actúa como intermediario entre el Modelo y la Vista, gestionando 		el flujo de información entre ellos y las transformaciones para adaptar los datos a las 		necesidades de cada uno.</li>
				</ul>	
					
				<h3>El controlador frontal</h3>
				<p>
					En un MVC con controlador frontal, todas las peticiones pasan por el fichero index.php y son 	procesadas mediante el <b>FrontController</b>, que invocará el controlador adecuado.<br>
					Usar un controlador frontal simplifica el mantenimiento, la escalabilidad, la seguridad y la 	gestión de errores.
				</p>

				<h3>El controlador frontal (FrontController) es un controlador especial:</h3>
				<ul>
					<li>Recibe las peticiones de operación por HTTP.</li>
					<li>Se encarga de invocar el controlador adecuado, por lo que lo podemos encontrar también con el 		nombre de “dispatcher”.</li>
					<li>Puede gestionar los errores y/o excepciones de la aplicación.</li>
				</ul>
				<h3>La base de datos:</h3>
				<p>
					El contenido de la base de datos fue facilitada por <a href="http://robertsallent.com" target="_blank">Robert Sallent</a>, y su contenido ha sido escrito en <b>Catalán</b>.
				</p>
				<hr><hr>
				<h2>Como funciona la aplicación</h2>
				<p>
					El objetivo de esta aplicación es la de poder crear acciones formativas, módulos, 	preguntas con 	sus respectivas respuestas y relacionarlos entre sí. El único usuario que podrá realizar estos 	cambios es el administrador. <br><br>
					Cuando un usuario se registre e inicie sesión, podrá resolver las preguntas de los diferentes módulos y después de responder las preguntas puede corregirlas para ver cuantos aciertos o 	cuantos fallos tuvo.<br><br>
					Si quieres acceder con un privilegio superior al de un usuario normal, lo puedes hacer con <br>
					usuario: <b>alex</b><br>
					pass: 1234 <br>
					Este usuario podrá ver el listado de usuario, los formularios para crear acciones formativas, modulos y preguntas, pero no se le permitirá realizar ningun cambio en la base de datos.
				</p>
			</div>
		</div>		
		<?PHP Template::footer($usuario);?>
	</body>
</html>
