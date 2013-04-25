<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>La Nueva Naranja</title>
	<meta charset="utf-8"/> 
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" href="css/css/font-awesome.css">
	<link rel="shortcut icon" href="images/favicon.ico"/>

    <script type="text/javascript" src="javascript/valida_login.js"></script>
</head>

<body>
	<div id="page_wrapper">
		<header>
			<div class="container">
			<a href="index.php"><img alt="Rescue" class="retina_logo" id="logo" src="imagenes/logo.png" /></a></div>
			<div class="container">
				<nav>
					<ul>
						<li><a href="login.php"><i class="icon-user"></i>Login</a></li>
						<li><a href="new_user.php"><i class="icon-pencil"></i>Registro</a></li>
						<li><a href="contact.php"><i class="icon-envelope-alt"></i>Contacto</a></li>
						<li><a href="#"><i class="icon-shopping-cart"></i>Carrito {0}</a></li>
						<li><a href="admin_panel.php"><i class="icon-globe"></i>Panel Admin</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="admin"></div>
		<section class="container">
		
			<!-------------------------
				Comeinzo lado derecho, Menu 
			-------------------------->
			<div id="side_left">
				<div class="widget">
				<div class="head_menu">Funciones</div>
				<div class="body_admin">
					<ul>
						<li class="selected"><i class="icon-bar-chart"></i>Administracion Index</li>
						<li><a href="admin_users.php"><i class="icon-group"></i>Administrar Usuarios</a></li>
						<li><a href="admin_items.php"><i class="icon-paste"></i>Administrar Artículos</a></li>
						<li><i class="icon-truck"></i><s>Administrar Provedores</s></li>
						<li><i class="icon-sitemap"></i><s>Administrar Página</s></li>
						<li><i class="icon-money"></i><s>Administrar Ganancias</s></li>
						<li><i class="icon-envelope"></i><s>Enviar Promociones</s></li>
						<li><i class="icon-gift"></i><s>Crear cupon</s></li>
					</ul>
				</div>
				</div>

			</div>
			
			<!---------------------------------
				Comienzo contenedor principal
			---------------------------------->
			<div id="main_container">
				<h2>Pruebas</h2>

					<form action="upload.php" method="post" enctype="multipart/form-data">
  						 <input name="archivo" type="file" size="35" />
 						 <input name="enviar" type="submit" value="Upload File" />
 						 <input name="action" type="hidden" value="upload" />     
					</form>

			</div>
		</section>

		<div class="limpiar"></div>

		<footer class="container">
			<p>La Nueva Naranja &copy; 2013. Algunos derechos reservados.</p>
		</footer>
 
	</div>
</body>
</html>