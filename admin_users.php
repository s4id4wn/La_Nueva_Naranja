<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();

	if(empty($_SESSION['logueado']) || $_SESSION['logueado'] != "activa") {
		//Error usuario no logueado
		header('Location: ../../error.php?error=1');
		die();
	}

	if(empty($_SESSION['prioridad']) || $_SESSION['prioridad'] != 5) {
		//Error de permisos
		header('Location: ../../error.php?error=2');
		die();
	}
				
?>
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
						<li><a href="php/logout.php"><i class="icon-signout"></i>Desconectar[<?php echo $_SESSION['usuario']; ?>]</a></li>
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
						<li><a href="admin_panel.php"><i class="icon-bar-chart"></i>Administracion Index</a></li>
						<li class="selected"><i class="icon-group"></i>Administrar Usuarios</li>
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
			
			<h2>Administrar Usuarios</h2>

<?php
	include_once('PHP/lib.php');
			
	connectBD();
	
	include_once('PHP/user/SQL/user.php');
	
	$result = getAllUsers();
	
//	mysql_close();
	
	if( mysql_num_rows( $result ) != 0)
	{
	?>
	
	<table id="customers" >
<tr>
  <th>Id</th>
  <th>Usuario</th>
  <th>Nombres</th>
  <th>Apellidos</th>
  <th>Correo</th>
  <th>Municipio</th>
  <th>Dirección</th>
  <th>Teléfono</th>
  <th>Acciones</th>
</tr>

<?php	
	while( $user = mysql_fetch_array( $result ) ){
?>
	<tr bgcolor=#bdc3d6>
				
	<tr>			
		<td align="center"><?php echo $user['id']; ?></td>
		<td align="center"><?php echo $user['user']; ?></td>
		<td align="center"><?php echo $user['name']; ?></td>
		<td align="center"><?php echo $user['last_name']; ?></td>
		<td align="center"><?php echo $user['email']; ?></td>
		<td align="center"><?php echo $user['town']; ?></td>
		<td align="center"><?php echo $user['address']?></td>
		<td align="center"><?php echo $user['telephone_number']?></td>
					
		<td align="center">
			<a href="new_user.php?id=<?php echo $user['id']; ?>">Editar</a>
			<!-- Corregir la siguiente linea-->
			<a href="EliminarUsuario.php?id=<?php echo $user['id']; ?>" onclick="return confirm('¿Desactivar el usuario:&nbsp;<?php echo $user['name']?>?')">Desactivar</a>
		</td>
	</tr>
<?php
	}    
?>
</table>
	<?php
	}
	else
	{
	//no hay registros de usuarios
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