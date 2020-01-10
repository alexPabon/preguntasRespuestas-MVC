function cargarPagina(){	
		//Cuando cargue la pagina, obtenemos la clase="contenedor"
	var contenedor = document.getElementsByClassName('contenedor');	
	
		//recorro los elementos de var contenedor y añadimos el envento
		//que cuando demos click cambien el atributo mediante el llamado a una funcion anonima
		//que se encuentra en la variable cambiarAtributo
	for(var i=0; i<contenedor.length; i++){		
		contenedor[i].addEventListener('click',cambiarAtributo,false);
	}		
}

	//funcion anonima para cambiar el atributo class de los hijos
	//p de la var contenedor
 var cambiarAtributo=function(){
	var cont= this.querySelectorAll("p");
	var verAtributo = cont[1].getAttribute('class')	

	if(verAtributo=='verDescripcion'){
		cerrarPestañas();
	}
	else{
		cerrarPestañas();
		this.setAttribute('class','verMarco');
		cont[0].setAttribute('class','accionesFormativas');
		cont[1].setAttribute('class','verDescripcion');
	}	
}

	//funcion para cambiar el atributo de todos los hijos p de la
	//var contenedor
function cerrarPestañas(){
	var contenedor = document.getElementsByClassName('verMarco');	
	var childs='';
	for(j=0;j<contenedor.length;j++){
		childs= contenedor[j].querySelectorAll("p");
		childs[0].setAttribute('class','');
		childs[1].setAttribute('class','accDescripcion');
		contenedor[j].setAttribute('class','contenedor');		
	}
}

