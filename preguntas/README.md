<h1>Aplicación para resolver preguntas</h1>
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

<h3>El fichero index.php</h3>
<p>
	El sentido del fichero index.php cambia totalmente. Antes en este fichero teníamos directamente 	la vista de portada o un script que cargaba la vista de portada. En un MVC con controlador 	frontal, la página index.php se limitará a invocar al método principal del FrontController, 	aunque también puede cargar algunos recursos adicionales, iniciar sesiones...
</p>

<h2>Programación orientada a objetos</h2>

<p>
	<b>Los lenguajes orientados a objeto:</b> el estilo de programación se caracteriza por la manera 	de gestionar la información, basándose en los conceptos de clase y objeto (entre otros). Hoy en 	día, la mayoría de aplicaciones se desarrollan mediante lenguajes de programación orientados a 	objeto.
</p>

<ul>
	<li>Un <b>objeto</b> es una abstracción de algún hecho o ente del mundo real, con atributos que 		representan sus características o propiedades, y métodos que emulan su comportamiento o 		actividad.</li>
	<li>Todas las propiedades y métodos comunes a los objetos se encapsulan o agrupan en clases.</li>
	<li>Una <b>clase</b> es una plantilla, un prototipo para crear objetos.</li>
	<li>Cada objeto es una instancia de una clase.</li>
</ul>

<h3>Los principios básicos de la orientación a objeto son:</h3>

<ul>
	<li>Abstracción</li>
	<li>Encapsulado</li>
	<li>Modularidad</li>
	<li>Jerarquía // Polimorfismo</li>
</ul>	

<h2>Como funciona la aplicación</h2>
<p>
	El objetivo de esta aplicación es la de poder crear acciones formativas, módulos, 	preguntas con 	sus respectivas respuestas y relacionarlos entre sí. El único usuario que podrá realizar estos 	cambios es el administrador. <br><br>
	Cuando un usuario se registre e inicie sesión, podrá resolver las preguntas de los diferentes 	módulos y después de responder las preguntas puede corregirlas para ver cuantos aciertos o 	cuantos fallos tuvo.
</p>