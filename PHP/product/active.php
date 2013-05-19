<?php
//session_start();
//if( !isset( $_SESSION['sesion1']) || $_SESSION['sesion1'] != "true"){
//header('Location: Ingresar.php?mensaje=Debes iniciar sesión');
//die();
//}


//include_once('../Sesion.php');
//verificarSesionIniciada();

 if( isset($_GET['id']) && is_numeric($_GET['id']) )
 {
	include_once('../lib.php');
		
	connectBD();

	include_once('SQL/product.php');
	
	$id_user = $_GET['id'];
	//verificar si null retorna cuando no existe el producto
	if( getUserById($id_product) != null )
	{
		$rows = active($id_product);
		if( $rows==true)
		{
			$succesful_action = true;
		}
		else
		{
			//error varias lineas afectadas
		}
	}
	else
	{
		//error no existe el producto
	}

	if( ! $succesful_action ){
	die('Error en la ejecución del SQL: ' . mysql_error() );
	}
	header('Location: ../../admin_products.php');
	die();
}
?>