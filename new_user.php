<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/*
	session_start();
	if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == "activa") { 
		header('Location: index.php');
	}
	
*/
?>
<html lang="es">
<head>
	<title>La Nueva Naranja</title>
	<meta charset="utf-8"/> 
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" href="css/css/font-awesome.css">
	<link rel="shortcut icon" href="images/favicon.ico"/>
	
    <script type="text/javascript" src="scripts/jquery-1.9.0.min.js"></script> 
    <script type="text/javascript" src="plugins/jquery.nivo.slider.js"></script>
	
	 <script type="text/javascript" src="JavaScript/validate_user.js"></script> 
	
	<link rel="stylesheet" href="plugins/light/light.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="plugins/nivo-slider.css" type="text/css" media="screen" />
	
</head>

<body>

	<div id="page_wrapper">
		<header>
			<div class="container">
				<a href="index.php"><img alt="Rescue" class="retina_logo" id="logo" src="imagenes/logo.png" /></a>
			</div>
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
						<FORM METHOD=POST ACTION="php/buscar.php"> 
							<INPUT TYPE="text" NAME="busqueda"> 
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
		
		if(isset($_GET['id']))
		{
		
			$user_id = $_GET['id'];
		
			include_once('PHP/lib.php');
			
			connectBD();
			
			include_once('PHP/user/SQL/user.php');
			
			$succesful_result = getUserById($user_id);
			
			if( $succesful_result )
			{
				$user = mysql_fetch_array($succesful_result);
			}
			else
			{
				//no existe el usuario o hubo un error con la BD
			}
				
		?>
		<!--  Cambiar las validaciones y el valor del action *************************************-->
		
			<form action="PHP/user/edit_user.php" method="post" onsubmit="return validateFormOfUser(this)">
			<h2>Editar usuario: <?php echo $user['name']?></h2>
		<?php
		}
		else
		{
		?>
			<form action="PHP/user/add_user.php" method="post" onsubmit="return validateFormOfUser(this)">
			<h2>Registro de  usuario</h2>
		<?php
		}
		?>
	
	<p>Campos con <span class="requerid">*</span> son requeridos</p>
	
	<table BORDER=0>
		<tr>
			<td>Usuario <span class="requerid">*</span> </td>
			<td> 
				<div  class="error" id="error_user">
					<p id="error_u"></p>
				</div>				
				<INPUT  type="text" name="user"
				<?php
					if(isset($_GET['id']))
					{
				?>
					value ="<?php echo $user['user']; ?>" />
				<?php
					}
				?>
			</td>
		</tr>
		
			<td>Contraseña <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_password">
					<p id="error_p"></p>
				</div>
				<input type="password" name="password">
			</td>
		</tr>

		<tr>
			<td>Confirmar Contraseña <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_confirm_password">
					<p id="error_cp"></p>
				</div>
				<input type="password" name="confirm_password">
			</td>
		</tr>
		
			<tr >
			<td>Nombres <span class="requerid">*</span> </td>
			<td>
				<div  class="error" id="error_name">
					<p  id="error_n"></p>
				</div>
				<INPUT  type="text" name="name"
				<?php
					if(isset($_GET['id']))
					{
				?>
					value ="<?php echo $user['name']; ?>" />
				<?php
					}
				?>
				
			</td>
		</tr>

		<tr>
			<td>Apellidos <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_last_name">
					<p id="error_ln"></p>
				</div>
				<INPUT type="text" name="last_name"
				<?php
					if(isset($_GET['id']))
					{
				?>
					value ="<?php echo $user['last_name']; ?>" />
				<?php
					}
				?>
				
			</td>
		</tr>

		<tr>
			<td>Correo <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_email">
					<p id="error_e"></p>
				</div>
				<input type="text" name="email" 
				<?php
					if(isset($_GET['id']))
					{
				?>
					value ="<?php echo $user['email']; ?>" />
				<?php
					}
				?>
				
			</td>
		</tr>

		<tr>
			<td>Repetir Correo <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_repeat_email">
					<p id="error_re"></p>
				</div>
				<input type="text" name="repeat_email" 
				<?php
					if(isset($_GET['id']))
					{
				?>
					value ="<?php echo $user['email']; ?>" />
				<?php
					}
				?>
			</td>
		</tr>
		<tr>
		
		<tr>
			<td>Municipio <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_town">
					<p id="error_t"></p>
				</div>
    <select name="town" >
      <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccionar</option>
      
      <option>Abal&aacute;</option>
      <option>Acanceh</option>
      <option>Akil</option>
      <option>Baca</option>
      <option>Bokob&aacute;</option>
      <option>Buctzotz</option>
      <option>Cacalch&eacute;n</option>
      <option>Calotmul</option>
      <option>Cansahcab </option>
      <option>Cantamayec</option>
      <option>Celest&uacute;n</option>
      <option>Cenotillo</option>
      <option>Conkal</option>
      <option>Cuncunul</option>
      <option>Cuzam&aacute;</option>
      <option>Chacsink&iacute;n</option>
  	  <option>Chankom</option>
      <option>Chapab</option>
      <option>Chemax</option>
      <option>Chicxulub Pueblo</option>
      <option>Chichimil&aacute;</option>
      <option>Chikindzonot</option>
      <option>Chochol&aacute;</option>
      <option>Chumayel</option>
      <option>Dzan</option>
  	  <option>Dzemul</option>
      <option>Dzidzant&uacute;n</option>
      
  	  <option>Dzilam de Bravo</option>
      <option>Dzilam Gonz&aacute;lez</option>
      <option>Dzit&aacute;s</option>
      <option>Dzoncauich</option>
      <option>Espita</option>
      <option>Halach&oacute;</option>
      <option>Hocab&aacute;</option>
      <option>Hoct&uacute;n</option>
      <option>Hom&uacute;n</option>
      <option>Huh&iacute;</option>
      <option>Hunucm&aacute;</option>
      <option>Ixil</option>
      <option>Izamal</option>
      <option>Kanas&iacute;n</option>
      <option>Kantunil</option>
      <option>Kaua</option>
  	  <option>Kinchil</option>
      <option>Kopom&aacute;</option>
      <option>Mama</option>
      <option>Man&iacute;</option>
      <option>Maxcan&uacute;</option>
      <option>Mayap&aacute;n</option>
      <option>M&eacute;rida</option>
      <option>Mococh&aacute;</option>
  	  <option>Motul</option>
      <option>Muna</option>
      <option>Muxupip</option>
      
      <option>Opich&eacute;n</option>
      <option>Oxkutzcab</option>
      <option>Panab&aacute;</option>
      <option>Peto</option>
      <option>Progreso</option>
      <option>Quintana Roo</option>
      <option>R&iacute;o Lagartos</option>
      <option>Sacalum</option>
      <option>Samahil </option>
      <option>Sanahcat</option>
      <option>San Felipe</option>
      <option>Santa Elena</option>
      <option>Sey&eacute;</option>
      <option>Sinanch&eacute;</option>
      <option>Sotuta</option>
      <option>Sucil&aacute;</option>
  	  <option>Sudzal</option>
      <option>Suma de Hidalgo</option>
      <option>Tahdzi&uacute; </option>
      <option>Tahmek</option>
      <option>Teabo</option>
      <option>Tecoh</option>
      <option>Tekal de Venegas</option>
      <option>Tekant&oacute; </option>
  	  <option>Tekax</option>
      <option>Tekit</option>
      <option>Tekom</option>
      
      <option>Telchac Pueblo</option>
      <option>Telchac Puerto</option>
      <option>Temax</option>
      <option>Temoz&oacute;n</option>
      <option>Tepak&aacute;n</option>
      <option>Tetiz</option>
      <option>Teya</option>
      <option>Ticul</option>
      <option>Timucuy </option>
      <option>Tinum</option>
      <option>Tixcacalcupul</option>
      <option>Tixkokob</option>
      <option>Tixm&eacute;huac</option>
      <option>Tixp&eacute;hual</option>
      <option>Tizim&iacute;n</option>
      <option>Tunk&aacute;s</option>
  	  <option>Tzucacab</option>
      <option>Uayma</option>
      <option>Uc&uacute;</option>
      <option>Um&aacute;n</option>
      <option>Valladolid</option>
      <option>Xocchel</option>
      <option>Yaxcab&aacute;</option>
      <option>Yaxkukul</option>
  	  <option>Yoba&iacute;n</option>
				
    </select>
	
	<br><br>
	
	</td>
	</tr>
		
		<tr>
			<td>Dirección <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_address">
					<p id="error_a"></p>
				</div>
				<input type="text" name="address"
				<?php
					if(isset($_GET['id']))
					{
				?>
					value ="<?php echo $user['address']; ?>" />
				<?php
					}
				?>
				
			</td>
		</tr>
		
		<tr>
			<td>Número telefónico <span class="requerid">*</span> </td>
			<td>
				<div class="error" id="error_telephone_number">
					<p id="error_tl"></p>
				</div>
				<input type="text" name="telephone_number"
				<?php
					if(isset($_GET['id']))
					{
				?>
					value ="<?php echo $user['telephone_number']; ?>" />
				<?php
					}
				?>
				
			</td>
		</tr>
		
		<tr>
			<td COLSPAN=2>
				<INPUT type="submit" value="Registrar" >
			</td>
		</tr>
</table>
 
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
