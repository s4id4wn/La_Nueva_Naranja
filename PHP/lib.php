<?php
function conectaBD()
{
	$servidor = 'localhost';
	$usuario = 'root';
	$contrasenia = '';

	$conexion = mysql_connect($servidor, $usuario, $contrasenia);
	if(!$conexion)
	{
		die('Error en la conexion al servidor:'.mysql_error() );
	}
}

function seleccionaBD()
{
	$baseDatos = 'lanuevanaranja';
	$seleccion = mysql_select_db($baseDatos);
	
	if(!$seleccion)
	{
		die('Error al seleccionar la base de datos: '.mysql_error());
	}
}

?>