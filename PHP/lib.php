
<?php
function connectBD(){
	
	connectToServer();
	connnectToBD();
}

private function connectToServer()
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

private function connnectToBD()
{
	$database = 'theneworange';
	$seleccion = mysql_select_db($database);
	
	if( !$successful_seleccion )
	{
		die('Error al seleccionar la base de datos: '.mysql_error());
	}
}
?>