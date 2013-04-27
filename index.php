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
                    document.getElementById('hola').innerHTML = '<h1>HOLA!!!!</h1><br><img src="imagenes/xd.jpg"/>';
                }
			});
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
						<li><a href="new_user.php"><i class="icon-pencil"></i>Registro</a></li>
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
						<INPUT type="text" name="search"> 
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
			
				<!-------------------------
					Comienzo del slider 
				-------------------------->
				<h2>Promociones</h2>
				<p id="hola"></p>
				<div class="limpiar"></div>
				<div class="slider-wrapper theme-light">
					<div id="slider" class="nivoSlider">
						<img src="plugins/images/toystory.jpg" data-thumb="plugins/images/toystory.jpg" alt="" />
						<img src="plugins/images/nemo.jpg" data-thumb="plugins/images/nemo.jpg" alt="" />
						<img src="plugins/images/walle.png" data-thumb="plugins/images/walle.png" alt="" />
					</div>
					<div id="htmlcaption" class="nivo-html-caption">
						<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
					</div>
				</div>
				<script type="text/javascript">
					$(window).load(function() {
					$('#slider').nivoSlider();
					});
				</script>
				<!-------------------------
					Fin del slider 
				-------------------------->
				
				<div class="limpiar"></div>
				<h2>Últimos Productos</h2>
				<div class="limpiar"></div>
				<div id="last_items">
					<div id="item_left">
						<div class="item_head">Nombre producto #1</div>
						<div class="item_body"><img src="imagenes/microondas.jpg" width="364" height="276"/></div>
						<div class="item_foot"><div class="price">Precio: $200.00</div><div class="details"><a href="#">Detalles</a></div><div class="car"><a href="#"><img src="imagenes/add.png"/></a></div></div>
					</div>
					
					<div id="item_right">
						<div class="item_head">Nombre producto #2</div>
						<div class="item_body"><img src="imagenes/descarga.jpg" width="364" height="276"/></div>
						<div class="item_foot"><div class="price">Precio: $200.00</div><div class="details"><a href="#">Detalles</a></div><div class="car"><a href="#"><img src="imagenes/add.png"/></a></div></div>
					</div>
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