 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

	session_start();
	/*
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
	
	 <script type="text/javascript" src="JavaScript/validate_product.js"></script> 
	
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
						<li><a href="login.php"><i class="icon-product"></i>Login</a></li>
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
					<FORM method="GET" action="search.php"> 
						<input type="text" name="search" class="loginn search"> 
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
		
			$product_id = $_GET['id'];
		
			include_once('PHP/lib.php');
			
			connectBD();
			
			include_once('PHP/product/SQL/product.php');
			
			$succesful_result = getProductById($product_id);
			
			if( $succesful_result )
			{
				$product = mysql_fetch_array($succesful_result);
			}
		?>
			<form name="form" action="PHP/product/edit_product.php" method="post" enctype="multipart/form-data" onsubmit="return validateFormOfProduct(this)" >
			<h2>Editar producto: <?php echo $product['name']?></h2>
			<!-- Enviamos el id para editar en la BD-->
			<input type="hidden" name="id" value="<?php echo $_GET['id']?>"/>
		<?php
		}
		else
		{
		?>
			<form name="form" action="PHP/product/add_product.php" method="post" onsubmit="return validateFormOfProduct(this)">
			<h2>Registro de producto</h2>
		<?php
		}
		?>
	
	<p>Campos con <span class="requerid">*</span> son requeridos</p>
	
	<table BORDER=0>
	
	
		<tr>
			<td>Marca <span class="requerid">*</span></td>
			
			<td>

    <select name="brand" onBlur="return validateBrand(this.value)" >
	
      <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccionar</option>
      
      <option>Abal&aacute;</option>
   
      <option>Yaxcab&aacute;</option>
      <option>Yaxkukul</option>
  	  <option>Yoba&iacute;n</option>
				
    </select>
	
		<div class="error" id="error_brand">
			<p id="error_b"></p>
		</div>
	
	</td>
	</tr>
		
		<tr>
			<td>Nombre <span class="requerid">*</span> </td>
			<td> 
				<input type="text" name="name" onBlur="return validateName(this.value)" value="<?php echo (isset($_GET['id']) && is_numeric($_GET['id']))? $product['name']: (isset($_GET['name'])? $_GET['name']: '' ); ?>" />
				
				<?php
					if(isset($_GET['exists_product']) && $_GET['exists_product'])
					{
				?>
						<p class="error2"><?php echo $_GET['exists_product'];?></p>
				<?php
					}
				?>
				<div  class="error" id="error_name">
					<p  id="error_n"></p>
				</div>				
				
			</td>
		</tr>

		
		
		
		<tr>
			<td>Precio <span class="requerid">*</span> </td>
			<td>
			<input  type="text" name="price" onBlur="return validatePrice(this.value)" value="<?php echo (isset($_GET['id']) && is_numeric($_GET['id']))? $product['price']: (isset($_GET['price'])? $_GET['price']: '' ); ?>" />
				<div  class="error" id="error_price">
					<p  id="error_p"></p>
				</div>
			</td>
		</tr>

		<tr>
			<td>Descripción <span class="requerid">*</span> </td>
			<td>
			<input type="text" name="description" onBlur="return validateDescription(this.value)" value="<?php echo (isset($_GET['id']) && is_numeric($_GET['id']))? $product['description']: (isset($_GET['description'])? $_GET['description']: '' ); ?>" />
				<div class="error" id="error_description">
					<p id="error_d"></p>
				</div>
				
			</td>
		</tr>
		
		<tr>
			<td>Cantidad <span class="requerid">*</span> </td>
			<td>
				
				<input type="text" name="amount" onBlur="return validateAmount(this.value)" value="<?php echo (isset($_GET['id']) && is_numeric($_GET['id']))? $product['amount']: (isset($_GET['amount'])? $_GET['amount']: '' ); ?>" />
				<div class="error" id="error_amount">
					<p id="error_a"></p>
				</div>
				
			</td>
		</tr>
		
		<tr>
			<td>Imagen <span class="requerid">*</span> </td>
			<td>
			<br>
				<input type="file" name="image" onBlur="return validateImage(this.value)" value="<?php echo (isset($_GET['id']) && is_numeric($_GET['id']))? $product['telephone_number']: (isset($_GET['telephone_number'])? $_GET['telephone_number']: '' ); ?>" />
				<div class="error" id="error_image">
					<p id="error_i"></p>
				</div>
				
			</td>
		</tr>
		
		<tr>
			<td COLSPAN=2>
				<input type="submit" name="Guardar" value="Guardar" >
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
