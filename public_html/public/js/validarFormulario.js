$(document).ready(function(){

	var formularioRegistro = document.getElementById('formRegistro');
	var entradas = formRegistro.getElementsByClassName('entradas');
	var contrasena0 = document.getElementById('pass');
	var contrasena = document.getElementById('rpass');
	var errorPass = document.getElementById('msnPass');
	var errorEntradas = document.getElementById('msnError');
	var valorLabel = "";

	for(j=0; j<entradas.length; j++){
		valorLabel = entradas[j].previousElementSibling.innerHTML;
		entradas[j].previousElementSibling.style.visibility="hidden";
		entradas[j].setAttribute('placeholder',valorLabel);

		entradas[j].addEventListener('focus', function(){
			this.previousElementSibling.style.visibility="visible";
			this.removeAttribute('placeholder');
		});
		
		entradas[j].addEventListener('blur', function(){
			if(this.value==""){
				valorLabel = this.previousElementSibling.innerHTML;
				this.previousElementSibling.style.visibility="hidden";
				this.setAttribute('placeholder',valorLabel);
			}else{
				this.removeAttribute('placeholder');
				this.previousElementSibling.style.visibility="visible";
			}
		});
			
	}	

	formRegistro.addEventListener('submit',function(e){
		e.preventDefault();		
		var todoCorrecto = true;
		errorEntradas.innerHTML="";
		
		for(var i=0; i<entradas.length; i++){
			if(entradas[i].value ==""){
				entradas[i].previousElementSibling.style.visibility="hidden";
				entradas[i].classList.add('Error');
				todoCorrecto = false;
				errorEntradas.innerHTML="Todos los campos son obligatorios";
			}
			else{
				entradas[i].classList.remove('Error');
				entradas[i].previousElementSibling.style.visibility="visible";			
			}
		}

		if(contrasena.value == contrasena0.value && contrasena.value.length>5){
			contrasena0.classList.remove('Error');
			contrasena.classList.remove('Error');
			errorPass.innerHTML= "";
		}else{
			todoCorrecto= false;
			contrasena0.classList.add('Error');
			contrasena.classList.add('Error');
			errorPass.innerHTML="Las contraseñas no coinciden";
			if(contrasena.value.length<6)
				errorPass.innerHTML="La contraseña debe tener minimo 6 caracteres";
		}

		if(todoCorrecto)
			formRegistro.submit();
	});

	contrasena.addEventListener('keyup',function(){
		if(contrasena.value != contrasena0.value)
			contrasena0.classList.add('Error');
		else
			contrasena0.classList.remove('Error');

	})

	contrasena.addEventListener('blur',function(){
		if(this.value == contrasena0.value && this.value.length>5){
			contrasena0.classList.remove('Error');
			this.classList.remove('Error');
			errorPass.innerHTML= "";
		}else{
			contrasena0.classList.add('Error');
			this.classList.add('Error');
			errorPass.innerHTML= "Las contraseñas no coinciden";
			if(this.value.length<6)
				errorPass.innerHTML="La contraseña debe tener minimo 6 caracteres"
		}
	});

});