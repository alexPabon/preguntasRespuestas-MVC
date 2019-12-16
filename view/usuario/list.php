<!DOCTYPE html>
<html>
	<head>
		<title>lista de usuarios</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/css/ampliada.css">
		<link rel="stylesheet" type="text/css" href="/css/templates.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="/js/templates.js"></script>
		<script type="text/javascript" src="/js/usuario.js"></script>
	</head>
	<body>
		<?php 
			//Template::header();
			Template::login($usuario);
			Template::menu();
		?>
		<div class="contenido">
			<div class="marco">
				<h2>Lista de usuarios</h2>
				<form id="buscar" method="post">
					<fieldset id="marcoForm"><legend>Filtrar listado</legend>
						<select for="busqueda" id="filtro" name="filtro">
							<option value="">------</option>
							<option id="filt" value="user" <?=($fColumna=='user')?'selected':'';?>>Usuario</option>						
							<option class="elec" value="email" <?=($fColumna=='email')?'selected':'';?>>Email</option>
						</select>
						<input id="busqueda" type="text" name="busqueda" maxlength="14" value="<?=(!empty($fBuscar))? $fBuscar:''?>">						
					</fieldset>
				</form>
				<table cellspacing="0" id="tabla1">
					<tr>
						<th>Usuario</th>
						<?php if(Login::isAdmin()){?>
							<th>Privilegio</th>
							<th>Admin</th>
						<?php }?>
						<th>Email</th>
						<th>Operaciones</th>
					</tr>
					<tr>
						<?php
							
							if(empty($_POST['filtro']))
								foreach ($usuarios as $u){
								  echo "<tr>";
							           echo "<td>$u->user</td>";
							           if(Login::isAdmin()){
								           echo "<td>$u->privilegio</td>";
								           echo "<td>".($u->administrador?'SI':'NO')."</td>";
							           }
							           echo "<td>$u->email</td>";
							           echo "<td>";
						           			if(Login::privilegio(500))
							               		echo "<a href='/User/show/$u->id'>Ver</a>";
							               	if(Login::isAdmin()){
							            	    echo "<a href='/User/edit/$u->id'>Actualizar</a>";
								                echo "<a href='/User/delete/$u->id'>Borrar</a>";
							                }			            
							           echo "</td>";
						           echo "</tr>";
								}
							else
								foreach ($filtro as $u){
								  echo "<tr>";
							           echo "<td>$u->user</td>";
							           if(Login::isAdmin()){
								           echo "<td>$u->privilegio</td>";
								           echo "<td>".($u->administrador?'SI':'NO')."</td>";
							           }
							           echo "<td>$u->email</td>";
							           echo "<td>";
						           			if(Login::privilegio(500))
							               		echo "<a href='/User/show/$u->id'>Ver</a>";
							               	if(Login::isAdmin()){
							            	    echo "<a href='/User/edit/$u->id'>Actualizar</a>";
								                echo "<a href='/User/delete/$u->id'>Borrar</a>";
							                }			            
							           echo "</td>";
						           echo "</tr>";
								}
						?>
					</tr>
				</table>
			</div>
		</div>
		<?PHP Template::footer($usuario);?>
	</body>
</html>