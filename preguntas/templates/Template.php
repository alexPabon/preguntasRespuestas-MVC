<?php
class Template{

	public static function login($usuario=NULL){ ?>
		<div class="login"><?php			
			if(!$usuario){?>
				<form method="post">
					<div>
    					<label class="log">Usuario:</label>
    					<input id="user" class="identificar" type="text" name="user">
					</div>
					<div>
    					<label class="log">Contraseña:</label>
    					<input class="identificar" type="password" name="password">
					</div>
					<input type="submit" name="login" value="Iniciar sesion">
				</form>
				<form method="post" action="/user/regi">
					<input type="submit" name="registrar" value="Registrarse">
				</form>
			<?php }else{?>
				<form method="post">
					<label class="log" id="bienvenida">Bienvenido <?=$usuario->user?></label>
					<input type="submit" name="logout" value="logout">
				</form>
			<?php } ?>
		</div>		
	<?php }

	public static function menu(){ ?>
		<nav id="menuPrincipal">
			<div class="inicio">
				<h2><a href="/">Inicio</a></h2>
				<span class="btnBurger"><hr><hr><hr></span>				
			</div>
			<div id="contBotons" class="menu">				
				<div class="botmenu">
					<h4>Acc Formativas</h4>
					<ul class="lis">
						<li><a href="/action">Ver Acciones</a></li>
						<?php
							if(Login::isAdmin()||Login::privilegio(500))
								echo "<li><a href='/action/create'>Crear una Acciones</a></li>";
						?>
					</ul>
				</div>
				<div class="botmenu">
					<h4>Modulos</h4>
					<ul class="lis">
						<li><a href="/module">Ver Modulos</a></li>
						<?php
							if(Login::isAdmin()||Login::privilegio(500))
								echo "<li><a href='/module/create'>Crear un Modulo</a></li>";
						?>
					</ul>
				</div>
				<div class="botmenu">
					<h4>Preguntas</h4>
					<ul class="lis">
						<?php
						if(Login::privilegio(0)){
							echo "<li><a href='/query'>Ver Preguntas</a></li>";
							if(Login::isAdmin()||Login::privilegio(500))
								echo "<li><a href='/query/create'>Crear una Pregunta</a></li>";
						}else
							echo "<li><a href='#user'>Primero, debes iniciar session</a></li>";
						?>
						
					</ul>
				</div>
				<?php if(Login::privilegio(500)){ ?>
					<div class="botmenu">
						<h4>Usuarios</h4>
						<ul class="lis">
							<li><a href="/user">Ver Usuarios</a></li>
							<li><a href="/user/create">Crear un Usuario</a></li>
						</ul>
					</div>
				<?php } ?>
				<?php if(Login::isAdmin()){?>
					<a href="/marksmap" class="boton">Ver en el Mapa</a> 
					<a href="/marksmap/actualizar" class="boton">Actualizar Datos</a>
            		<a href="/marksmap/list" class="boton">Ver El listado de Ips</a>
				<?php }	?>
			</div>
		</nav>
	<?php }

	public static function footer($usuario=NULL){?>
		<footer>
			<p title="Formulario de contacto"><b>contacto:</b><br><b>Alexander Pabon</b>: alepabon@gmail.com</p>
			<form id="formContacto" class="oculto" method="post" action="">
				<ul class="EntradasContacto">
					<li>
						<label class="labEntradas" for="nombre">Nombre</label>
						<input class="infoEntradas" id="nombre" type="text" name="nombre" placeholder="Nombre">
					</li>
					<li>
						<label class="labEntradas" for="email">Email</label>
						<input class="infoEntradas" id="email" type="email" name="email" placeholder="Email" value="<?=$usuario?$usuario->email:''?>">		
						<input type="hidden" name="MiEmail" placeholder="MiEmail" value="alepabon@gmail.com">
					</li>
					<li class="empresaTel">
						<label class="labEntradas" for="empresa">Empresa</label>
						<input class="infoEntradas" id="empresa" type="text" name="empresa" placeholder="Empresa">						
					</li>
					<li class="empresaTel">
						<label class="labEntradas" for="tel">Telefono</label>
						<input class="infoEntradas" id="tel" type="number" name="tel" placeholder="Telefono" maxlength="15">
					</li>
					<li>
						<label class="labEntradas" for="asunto">Asunto</label>
						<input class="infoEntradas" id="asunto" type="text" name="asunto" placeholder="Asunto">						
					</li>
					<li>
						<label class="labEntradas" for="mensaje">Mensaje</label>
						<textarea id="mensaje" class="infoEntradas" name="mensaje" maxlength="500" placeholder="Mensaje"></textarea>
					</li>
					<li>
						<input id="acepto" type="checkbox" name="acepto">
						<label id="condiciones" for="acepto">Acepto la <a href=""><b>POLITICA DE PRIVACIDAD</b></a></label>			
					</li>
					<li class="contBoton">
						<input id="ocultForm" type="button" value="Ocultar Formulario">
						<input type="submit" name="contacto" value="Enviar">
					</li>
				</ul>
			</form>
			<div id="respuesta"></div>			
		</footer>
	<?php }
}