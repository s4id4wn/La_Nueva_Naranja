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
						<li><a href="admin_panel.php"><i class="icon-bar-chart"></i>Administracion Index</a></li>
						<li><a href="admin_users.php"><i class="icon-group"></i>Administrar Usuarios</a></li>
						<li class="selected"><i class="icon-paste"></i>Administrar Artículos</li>
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
				<h2>Administación de Artículos</h2>
				<h3>Crear nuevo articulo</h3>
									<FORM action="cgi-bin/script.pl" method="post" onsubmit="validateFormOfUser(this)" >
<TABLE BORDER=0>
  <TR class="bordcurv">
	<TD width="153">Nombre:</TD>
	<TD width="172">
    
	<INPUT  type="text" name="name">
   
	</TD>
</TR>

<TR>
	<TD>Apellido:</TD>
	<TD>
	<INPUT type="text" name="last_name">
	</TD>
</TR>

<TR>
  <TD>Correo:</TD>
  <TD><input type="text" name="email" id="textfield"></TD>
</TR>

<TR>
  <TD>Repetir Correo:</TD>
  <TD><input type="text" name="repeat_email" id="textfield"></TD>
</TR>

<TR>
	<TD>Contraseña:</TD>
	<TD><label ></label>
	  <input type="password" name="password" id="contra"></TD>
</TR>

<TR>
  <TD>Confirmar Contraseña</TD>
  <TD><label ></label>
    <input type="password" name="confirm_password"></TD>
</TR>
<TR>
  <TD>Localidad</TD>
  <TD><label ></label>
    <input type="text" name="localidad" id="localidad"></TD>
</TR>
<TR>
  <TD>Dirección</TD>
  <TD><label ></label>
    <input type="text" name="address" id="calle"></TD>
</TR>
<TR>
  <TD>Telefono</TD>
  <TD><label ></label>
    <input type="text" name="telephone_number" id="telefono"></TD>
</TR>


<TR>
</TR>
<TR>
	<TD COLSPAN=2>
	  <INPUT type="submit" value="Registrar">
</TD>
</TR>
</TABLE>
 
</FORM>
				<h3>Administrar articulos</h3>


<table id="customers">
<tr>
  <th>Company</th>
  <th>Contact</th>
  <th>Country</th>
</tr>
<tr>
<td>Alfreds Futterkiste</td>
<td>Maria Anders</td>
<td>Germany</td>
</tr>
<tr class="alt">
<td>Berglunds snabbköp</td>
<td>Christina Berglund</td>
<td>Sweden</td>
</tr>
<tr>
<td>Centro comercial Moctezuma</td>
<td>Francisco Chang</td>
<td>Mexico</td>
</tr>
<tr class="alt">
<td>Ernst Handel</td>
<td>Roland Mendel</td>
<td>Austria</td>
</tr>
<tr>
<td>Island Trading</td>
<td>Helen Bennett</td>
<td>UK</td>
</tr>
<tr class="alt">
<td>Königlich Essen</td>
<td>Philip Cramer</td>
<td>Germany</td>
</tr>
<tr>
<td>Laughing Bacchus Winecellars</td>
<td>Yoshi Tannamuri</td>
<td>Canada</td>
</tr>
<tr class="alt">
<td>Magazzini Alimentari Riuniti</td>
<td>Giovanni Rovelli</td>
<td>Italy</td>
</tr>
<tr>
<td>North/South</td>
<td>Simon Crowther</td>
<td>UK</td>
</tr>
<tr class="alt">
<td>Paris spécialités</td>
<td>Marie Bertrand</td>
<td>France</td>
</tr>
</table>

			</div>
		</section>

		<div class="limpiar"></div>

		<footer class="container">
			<p>La Nueva Naranja &copy; 2013. Algunos derechos reservados.</p>
		</footer>
 
	</div>
</body>
</html>