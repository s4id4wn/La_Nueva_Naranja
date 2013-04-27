<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	include_once('php/lib.php');
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
				<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
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
						<FORM method="POST" action="php/buscar.php"> 
							<INPUT type="text" name="busqueda" value=" <?php echo $_GET['search']; ?>"> 
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
				<?php
				if (!isset($_GET['search']) || $_GET['search'] == "" ){ 
    				echo "<h2>Debe especificar una cadena a buscar</h2>"; 
				}
				else{
					$search = $_GET['search'];
					//Evita inyecciones HTML
					$search = htmlspecialchars($search);
					$search = htmlentities($search);

					echo "<h2>Busqueda: " . $search . "</h2>";
					connectBD();

					$SQL_Sentence = "SELECT * FROM tbl_product WHERE name LIKE '%$search%' ORDER BY name";
					$result = mysql_query($SQL_Sentence);

					if($row = mysql_fetch_array($result)){
					
						do {
							echo "<div class='box_producto'>";
							echo "<div class='imagen'><img src='" . $row['url_image'] . "'/></div>";
							echo "<div class='info'><div class='header'>";
							if($row['amount'] == 0){
								echo "<div class='agotado'>Agotado</div>";
							}else{
								echo "<div class='disponible'>Disponible</div>";
							}
							echo "<div class='product_name'>" . $row['name'] . "</div></div>";
							echo "<div class='description'>" . $row['description'] ."</div></div></div>";
						}while ($row = mysql_fetch_array ($result));

					}else{
						echo "No se encontro ningun resultado";
					}
				?>
				<!--
				<div class="box_producto">
					<div class="imagen"><img src="imagenes/2.png"/></div>
					<div class="info">
						<div class="header"><div class="agotado">Agotado</div><div class="product_name">Plancha</div></div>
						<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet accumsan leo sit amet pretium. Fusce tempor euismod pulvinar</div>
					</div>
				</div>

				<div class="box_producto">
					<div class="imagen"><img src="imagenes/3.png"/></div>
					<div class="info">
						<div class="header"><div class="disponible">Disponible</div><div class="product_name">Horno 2 quemadores</div></div>
						<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet accumsan leo sit amet pretium. Fusce tempor euismod pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet accumsan leo sit amet pretium. Fusce tempor euismod pulvinarLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet accumsan leo sit amet pretium. Fusce tempor euismod pulvinarLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet accumsan leo sit amet pretium. Fusce tempor euismod pulvinarLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet accumsan leo sit amet pretium. Fusce tempor euismod pulvinar</div>
					</div>
				</div>
				-->

				<?php
				}
				?>

			</div>
		</section>

		<div class="limpiar"></div>

		<footer class="container">
			<p>La Nueva Naranja &copy; 2013. Algunos derechos reservados.</p>
		</footer>
 
	</div>
</body>
</html>