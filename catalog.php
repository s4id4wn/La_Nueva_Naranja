<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<html lang="es">
<head>
	<title>La Nueva Naranja</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	
	<link rel="stylesheet" href="plugins/light/light.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="plugins/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/css/font-awesome.css">
	
    <script type="text/javascript" src="scripts/jquery-1.9.0.min.js"></script> 
    <script type="text/javascript" src="plugins/jquery.nivo.slider.js"></script>
	<script type="text/javascript" src="plugins/konami/konami.js"></script>
	
    <script type="text/javascript" charset="utf-8">
            $(document).konami({
                code: ['up', 'up', 'down', 'down'], 
                callback: function() {
                    document.getElementById('hola').innerHTML = '<img src="imagenes/yao.jpg"/>';
                }
			});
	</script>
	<script type="text/javascript">
		function ajustar(){
			alert('hola');
			var side_left = document.getElementById('side_left').style.height;
			var main_container = document.getElementById('main_container').style.height;
			if(side_left > main_container){
				side_left = main_container;
			}
		}	
	</script>
	
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
						<li><a href="php/logout.php" alt="Desconectar"><i class="icon-signout"></i>[<?php echo $_SESSION['usuario']; ?>]</a></li>
						<?php } ?>
					</ul>
				</nav>
					<!--<p class="as container">hola</p>-->
			</div>
		</header>
		
		<div id="second_menu" class="container">
			<ul>
				<li><a class="selected" href="#"><i class="icon-home"></i>Inicio</a></li>
				<li><a href="#">Categoria2</a></li>
				<li><a href="#">Categoria3</a></li>
				<li><a href="#">Categoria4</a></li>
				<li><a href="#">Categoria5</a></li>
			</ul>
		</div>
 		<div class="limpiar"></div>

		<section class="container">
		
			<!-------------------------
				Comeinzo lado derecho, Menu 
			-------------------------->
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
						<li><a href="#" class="selected">Televisores (30)</a></li>
						<li><a href="#">Estufas (14)</a></li>
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
					<div align="center"><img src="imagenes/marca.gif"></div>
				</div>
				</div>

			</div>
			
			<!---------------------------------
				Comienzo contenedor principal
			---------------------------------->
			<div id="main_container">
				<h2>Catálogo: Televisores</h2>
					
					<div class="box_item_cat">
						<div class="item_cat_name">Producto 1</div>
						<div class="item_cat_image"><img src="imagenes/ooo.jpg" height="100px"></div>
						<div class="item_cat_info">Detalles</div>
						<div class="item_cat_price">$200</div>
						<div class="item_cat_addcar"><a href="sasa">Agregar</a></div>
					</div>
					
					<div class="box_item_cat">
						<div class="item_cat_name">Producto 2</div>
						<div class="item_cat_image"><img src="imagenes/descarga.jpg" height="100px"></div>
						<div class="item_cat_info">Detalles</div>
						<div class="item_cat_price">$200</div>
						<div class="item_cat_addcar"><a href="sasa">Agregar</a></div>
					</div>
					
					<div class="box_item_cat">
						<div class="item_cat_name">Producto 3</div>
						<div class="item_cat_image"><img src="imagenes/ppp.jpg" height="100px"></div>
						<div class="item_cat_info">Detalles</div>
						<div class="item_cat_price">$200</div>
						<div class="item_cat_addcar"><a href="sasa">Agregar</a></div>
					</div>
					
					<div class="box_item_cat">
						<div class="item_cat_name">Producto 4</div>
						<div class="item_cat_image"><img src="imagenes/hhh.jpg" height="100px"></div>
						<div class="item_cat_info">Detalles</div>
						<div class="item_cat_price">$200</div>
						<div class="item_cat_addcar"><a href="sasa">Agregar</a></div>
					</div>
					
			</div>
		</section>
		<div class="limpiar"></div>
		<footer class="container">
			<p>La Nueva Naranja &copy; 2013. Algunos derechos reservados.</p>
		</footer>
 
	</div>
 
</body>
</html>