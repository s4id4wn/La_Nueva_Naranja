<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();

	if(empty($_SESSION['logueado']) || $_SESSION['logueado'] != "activa") {
		//Error usuario no logueado
		header('Location: error.php?error=1');
		die();
	}

	if(empty($_SESSION['prioridad']) || $_SESSION['prioridad'] != 5) {
		//Error de permisos
		header('Location: error.php?error=2');
		die();
	}
?>
<html lang="es">
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
		<div id="header_admin">
			<div class="container">
			<a href="index.php"><img alt="Rescue" class="retina_logo" id="logo" src="imagenes/logo_admin.png" /></a></div>
			<div class="container">
				<nav>
					<ul>
						<li><a href="index.php"><i class="icon-exchange"></i>Ir Nueva Naranja</a></li>
						<?php if (empty($_SESSION["usuario"])) { ?>
						<li><a href="login.php"><i class="icon-user"></i>Login</a></li>
						<?php } ?>
						<?php
						if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == "activa") { ?>
						<li><a href="php/logout.php"><i class="icon-signout"></i>[<?php echo $_SESSION['usuario']; ?>]</a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</div>

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
				<h2>Bienvenido al panel de Administrador</h2>
				<p>@<?php echo '<b>'.$_SESSION['usuario'].'</b>'; ?> aquí podrá realizar acciones que le permitan editar, crear, borrar o actualizar datos.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet accumsan leo sit amet pretium. Fusce tempor euismod pulvinar. Duis dui nisl, tincidunt et porttitor ut, lobortis vitae ipsum. Vivamus malesuada tortor a est posuere vitae luctus turpis imperdiet. Sed iaculis adipiscing eros. Suspendisse lobortis fermentum turpis luctus rhoncus. Vivamus feugiat feugiat porttitor. In ut dictum mauris. Donec ornare dolor a eros consectetur non ullamcorper elit consequat. Cras consectetur, tortor eget volutpat dignissim, est nulla consequat turpis, vitae scelerisque massa tellus non lectus. Fusce tempus, erat et tempor lacinia, dolor elit suscipit dui, eu cursus arcu eros sed diam. Etiam tempor lobortis turpis sed pharetra. Cras odio purus, condimentum in dictum faucibus, bibendum consectetur enim. Donec ultrices consectetur mi ut ultricies.</p>
			</div>
		</section>

		<div class="limpiar"></div>

		<footer class="container">
			<p>La Nueva Naranja &copy; 2013. Algunos derechos reservados.</p>
		</footer>
 
	</div>
</body>
</html>