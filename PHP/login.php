<?php
	if(isset($_POST['user']) && isset($_POST['password']) ){
		include_once('lib.php');
		
		conectaBD();
		seleccionaBD();
		
		$usuario = $_POST['user'];
		$contrasenia = $_POST['password'];
		
		$consulta = "SELECT * FROM usuarios WHERE user='$usuario'";
		$resultado = mysql_query($consulta);

		if(!$resultado){
			//AQUI TODAVIA NO ESTA IMPLEMENTATOOOOOOOOOOOOO
			header('Location: ../login.php?error=3');
			die();
		}
		
		$user = mysql_fetch_array($resultado);
		
		//AQUI ESTO
		//if(crypt($contrasenia,$user['contrasenia']) == $user['contrasenia']){
		if($user['password'] === $contrasenia){
			session_start();
			$_SESSION['logueado'] = "activa";
			$_SESSION['usuario'] = $user['user'];
			
			//AQUI NO, DESDE LA BD
			$_SESSION['prioridad'] = 5;
			
			header('Location: ../index.php');
			die();

		}else{
			//AQUI TODAVIA NO ESTA IMPLEMENTATOOOOOOOOOOOOO
			header('Location: ../index.php?error=2');
			die();
		}
		
	}
	
	header('Location: index.php');
	die();
?>