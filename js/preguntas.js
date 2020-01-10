window.onload= function(){
		//Despues de cargar la pagina, obtenemos los formulario de las preguntas
		//de cada modulo
	var formPreguntas = document.getElementsByClassName("formModulos");
	var borrarRespuestas = document.getElementById('borrar');

	if(typeof(borrarRespuestas) != 'undefined' && borrarRespuestas != null){
		borrarRespuestas.addEventListener('click',function(){
			location.reload();
		});
	}
		//el bucle es para registrar un envento cuando pulsemos submit
		//en cada formulario.
	for(var i=0; i<formPreguntas.length;i++)
		formPreguntas[i].addEventListener('submit',function(e){
			e.preventDefault();
			var entradas = document.forms[this.getAttribute("name")];
			var nombreModulo= this.getAttribute("name");
			var claseRespuesta = this.getElementsByClassName("respuestas");
			var pregunta = [];						
			var respuesta=[];
			var nombre = '';
			var idenficador='';
			var claseResumen='';
			var cont=0;
			var cont1=0;
			var aciertos = "Total aciertos: "+ cont;
			var errores = "Total Errores: "+ cont1;		
			
				//Este bucle es para quitar las class de error y correcto
				//en todas las respuestas
			for(var m=0; m<claseRespuesta.length; m++){
				var va = claseRespuesta[m].id;
				document.getElementById(va).classList.remove("error");
				document.getElementById(va).classList.remove("correcto");
				console.log(va);				
			}

				//PARA RECUPERA EL NAME Y VALUE DEL LOS INPUTS SE TUVO QUE HACER EN 2 PASOS
				//YA QUE EN 1 PASO, GENERABA ERROR.
				//recuperamos el nombre de cada input type='radio' que nos llega por
				//post y lo guardamos en un array, esto nos serviara para despues buscar su valor.
			for(var j=0; j<entradas.length; j++){
				if(nombre!=entradas[j].name){
					pregunta.push(entradas[j].name);
					nombre = entradas[j].name;					
				}
			}

				//recorremos el array pregunta para recuperar los nombres del input type='radio' y asi
				//podemos saber cual es su valor.
			for(var k=0; k<pregunta.length-1; k++){
				var seleccionResp = document.forms[this.getAttribute("name")][pregunta[k]].value;				
				respuesta.push([nombreModulo, pregunta[k], seleccionResp]);				
			}
			
				//recorremos el array que hemos recibido por PHP y comparamos con los valores que nos
				//ha llegado por post del formulario que los tenemos guardados en el array respuesta
			for(var l=0; l<resp.length; l++){
				if(resp[l][0]==nombreModulo)
					for(i=0;i<respuesta.length;i++){
						idenficador = respuesta[i][2]+respuesta[i][1];							
						
							//si la respuesta es correcta, se añade una determinada class
						if(resp[l][1]==respuesta[i][1]&&resp[l][2]==respuesta[i][2]){														
							cont++;
							aciertos = "Total aciertos: "+ cont;														
							document.getElementById(respuesta[i][1]).classList.remove("error");
							document.getElementById(idenficador).classList.add("correcto");							
						}
						else{
							if(resp[l][1]==respuesta[i][1]&&resp[l][2]!=respuesta[i][2]){
								document.getElementById(respuesta[i][1]).classList.remove("error");
								document.getElementById(idenficador).classList.add("error");								
								cont1++;
								errores = "Total Errores: "+ cont1;
							}
						}
					}				
			}			

				//si el numero de aciertos es mayor que los errores se escribe
				//una determinada clase que se pondrá en el mensaje de  resumen de las respuestas
			if(cont>cont1)
				claseResumen="totalCorrecto";
			else
				claseResumen="totalError";

				//convertir la primera letra a mayuscula
			var mayus = nombreModulo;
			mayus=mayus.charAt(0).toUpperCase()+ mayus.substring(1);
			
				//mensaje de resumen de las respuestas correctas y errores
			document.getElementById("res"+mayus).innerHTML="<p class='"+claseResumen+"'>"+aciertos+"<br>"+errores+"</p>";
			
		});
}

$(document).ready(function(){
	//se cambia el nombre de la clase para que no haga efectos raros al cargar la pagina
	$('.contP').addClass('contPreguntas').removeClass('contP');

	var botModulos = $('.modulos');
	var listaPreguntas = $('.contPreguntas');	
	
	// Cerramos todo el contenido al cargar la página
	listaPreguntas.hide();
	
	//Botón de acción del acordeón
	botModulos.click(function(e) {
		e.stopPropagation();
		//Elimina la clase 'on' de todos los botones
		botModulos.removeClass('on');
		
		//Plegamos todo el contenido que esta abierto
	 	listaPreguntas.slideUp();

		//Si el siguiente slide no esta abierto lo abrimos
		if($(this).next().is(':hidden')) {

			//Añade la clase on en el botón
			$(this).addClass('on');

			//Abre el slide
			$(this).next().slideDown();
		}
	 });
});

