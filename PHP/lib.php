
<?php

function connectBD()
{	
	connectToServer();
	connnectToBD();
}

function connectToServer()
{
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$successful_connection = mysql_connect($server, $user, $password);
	
	if( !$successful_connection )
	{
		die('Error en la conexion al servidor:' . mysql_error() );
	}
}

function connnectToBD()
{
	$database = 'theneworange';
	$successful_seleccion = mysql_select_db($database);
	
	if( !$successful_seleccion )
	{
		die('Error al seleccionar la base de datos: ' . mysql_error() );
	}
}
?>