$(document).ready(function() {

	// ***************** MENU *********************************
	// ------------- Trabajando con Jquery --------------------
	
	//se cambia el nombre de la clase para que no haga efectos raros al cargar la pagina
	$('.lis').addClass('listas').removeClass('lis');
	
	var menu = $('.menu');
	var flagMenu = true;
	var botonesMenu = $('.botmenu h4');
	var listaOpciones = $('.listas');
	var botonBurger = $('.btnBurger');
	
	$(window).resize(function(){
		if($('body').width()>761)
			menu.removeAttr('style');		
	});
	
	
	// Cerramos todo el contenido al cargar la página
	listaOpciones.hide();
	
	//Botón de acción del acordeón
	botonesMenu.click(function(e) {
		e.stopPropagation();
		//Elimina la clase 'on' de todos los botones
		botonesMenu.removeClass('on');
		
		//Plegamos todo el contenido que esta abierto
	 	listaOpciones.slideUp();

		//Si el siguiente slide no esta abierto lo abrimos
		if($(this).next().is(':hidden')) {

			//Añade la clase on en el botón
			$(this).addClass('on');

			//Abre el slide
			$(this).next().slideDown();
		}
	 });

	$('body').click(function() {
    	listaOpciones.slideUp();
    	botonesMenu.removeClass('on');    	
	});
	
	botonBurger.click(function(){
		if(menu.is(':hidden')){
			menu.slideDown();
			flagMenu=false;
		}else{
			menu.slideUp();
			flagMenu=true;
		}
	});

	// ************************ FOOTER *******************************

	var entradas = $('.infoEntradas');
	var ocultarForm =$('#ocultForm');
	var mostrarForm = $('footer>p');
	var formularioContacto = document.getElementById('formContacto');
	var respuesta = document.getElementById('respuesta');
	var aceptoCondiciones = $('#acepto');
	var info ="";

		//si los campos de la entradas no se encuentran vacios
		//hacemos visible el label de la entrada correspondiente
	for (var i = entradas.length - 1; i >= 0; i--) {
		if(entradas.eq(i).val()!="")
			entradas.eq(i).prev().css("visibility","visible");	
	}

		//mostramos el formulario que esta oculto y hacemos scroll hasta el final de pagina
	mostrarForm.click(function(){
		$('#formContacto').removeClass('oculto').slideDown();
		$("html,body").animate({
			scrollTop: $(document).height()
		},700);
	});

		//si estamos dentro de la entrada, se quitara placeholder
	entradas.focus(function(){
		info = $(this).attr("placeholder");
		$(this).attr('placeholder','');
		$(this).prev().css("visibility","visible");		
	});
		//al salir de la entrada, comprueba que no haya quedado vacia
	entradas.blur(function(){		
		if($(this).val()==""){
			$(this).attr('placeholder',info);
			$(this).prev().css("visibility","hidden");
		}		
	});

		//oculta el formulario
	ocultarForm.click(function(){
		$('#formContacto').slideUp();
	});

		//Detiene el envio de datos, comprueba que los campos no se encuentren
		//vacios y despues envia los datos con fethc api
	formularioContacto.addEventListener('submit',function(e){
		e.preventDefault();
		var continuar = true;
		
		for (var i = entradas.length - 1; i >= 0; i--) {
			if(entradas.eq(i).val()==""){
				entradas.eq(i).addClass('Error');
				continuar=false;
			}
			else
				entradas.eq(i).removeClass('Error');
		}

			//si no aceptas las politica de privacidad
		if(!aceptoCondiciones.is(':checked')){
			alert('Para poder enviar el correo, debes aceptar la \nPOLITICA DE PRIVACIDAD');
			continuar=false;
		}

		if(continuar){

			//Fetch api de javascript, procesamos un formulario para enviar datos
			//mediante POST al controlador de PHP. Forma muy parecida a AJAX.
			var datos = new FormData(formularioContacto);
			$('#formContacto').slideUp();
			respuesta.innerHTML="Enviando correo <span class='enEspera'>......</span>";	

			fetch('/contact/mensaje',{
				method:'POST',
				body: datos
			})

				.then(res=> res.json())
				.then(data =>{
					respuesta.innerHTML=`${data}`;					
					setTimeout(function(){ location.reload(); }, 6000);		
				})			
		}		
	});
});