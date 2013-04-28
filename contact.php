<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<html lang="es">
<head>
	<title>La Nueva Naranja</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilos_menores.css"/>
	<link rel="stylesheet" href="css/css/font-awesome.css">
	
</head>

<body>
	<div id="page_wrapper">
		<header>
			<div class="container">
			<a href="index.php"><img alt="Rescue" class="retina_logo" id="logo" src="imagenes/logo.png" /></a></div>
			<div class="container">
				<nav>
					<ul>
						<?php if (empty($_SESSION["usuario"])) { ?>
						<li><a href="login.php"><i class="icon-user"></i>Login</a></li>
						<li><a href="form_user.php"><i class="icon-pencil"></i>Registro</a></li>
						<?php } ?>
						
						<li><a href="contact.php"><i class="icon-envelope-alt"></i>Contacto</a></li>
						<li><a href="#"><i class="icon-shopping-cart"></i>Carrito {0}</a></li>
						
						<?php if(isset($_SESSION['prioridad']) && $_SESSION['prioridad'] == "5" && isset($_SESSION['logueado']) && $_SESSION['logueado'] == "activa") { ?>
						<li><a href="admin_panel.php"><i class="icon-globe"></i>Panel Admin</a></li>
						<?php }
						if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == "activa") { ?>
						<li><a href="php/logout.php"><i class="icon-signout"></i>Desconectar[<?php echo $_SESSION['usuario']; ?>]</a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</header>
		
		<div id="second_menu" class="container">
			<ul>
				<li><a class="selected" href="#">Inicio</a></li>
				<li><a href="#">Categoria2</a></li>
				<li><a href="#">Categoria3</a></li>
				<li><a href="#">Categoria4</a></li>
				<li><a href="#">Categoria5</a></li>
			</ul>
		</div>
 		<div class="limpiar"></div>
		<section class="container">
			<div id="side_left">
			
				<div class="widget">
				<div class="head_menu">Buscador</div>
				<div class="body">
					<FORM method="GET" action="search.php"> 
						<INPUT type="text" name="search" class="loginn search"> 
					</FORM> 
				</div>
				</div>
				
				<div class="widget">
				<div class="head_menu">Catálogo de productos</div>
				<div class="body">
					<ul>
						<li><a href="#" class="selected">Linea Blanca</a></li>
						<li><a href="#">Electrodomesticos</a></li>
						<li><a href="#">Tu texto 3</a></li>
						<li><a href="#">Tu texto 4</a></li>
						<li><a href="#">Tu texto 5</a></li>
						<li><a href="#">Tu texto 6</a></li>
						<li><a href="#">Tu texto 7</a></li>
						<li><a href="#">Tu texto 8</a></li>
					</ul>
				</div>
				</div>
				<div class="widget">
				<div class="head_menu">Catálogo de productos</div>
				<div class="body">
					<ul>
						<li><a href="#" class="selected">Tu texto 1</a></li>
						<li><a href="#">Tu texto 2</a></li>
						<li><a href="#">Tu texto 3</a></li>
						<li><a href="#">Tu texto 4</a></li>
						<li><a href="#">Tu texto 5</a></li>
						<li><a href="#">Tu texto 6</a></li>
					</ul>
				</div>
				</div>

				<div class="widget">
				<div class="head_menu">Nuestras Marcas</div>
				<div class="body">
					<img src="imagenes/marca.gif">
				</div>
				</div>

			</div>
			<!---------------------------------
				Comienzo contenedor principal
			---------------------------------->
			<div id="main_container">		
				<h2>Envianos tus sugerencias</h2>		
				<FORM name='login' method='post' action="php/login.php">
				<table>
					<tr>
						<TD>Nombre:</TD><TD><INPUT type='text' name="user" class="contact"></TD>
					</tr>
					<tr>
						<TD>Correo:</TD><TD><INPUT type='text' name="user" class="contact"</TD>
					</tr>
					<tr>
						<td>Comentario:</td><td><textarea rows="4" cols="50"></textarea></td>
					</tr>
					<tr>
						<td>CAPTCHA AQUI</td>
					</tr>
					<tr>
						<td><INPUT type="submit" value="Ingresar"></td>
					</tr>
				</table>
				</FORM>
			</div>
		</section>
		<div class="limpiar"></div>
		<footer class="container">
			<p>La Nueva Naranja &copy; 2013. Algunos derechos reservados.</p>
		</footer>
 
	</div>
 
</body>
</html>