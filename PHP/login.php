<?php
	if(isset($_POST['user']) && isset($_POST['password']) ){
		include_once('lib.php');
		
		conectaBD();
		seleccionaBD();
		
		$usuario = $_POST['user'];
		$contrasenia = $_POST['password'];
		
		$SQL_Setence = "SELECT * FROM tbl_user WHERE user='$usuario'";
		$result = mysql_query($SQL_Setence);

		if(!$result){
			header('Location: ../login.php?error=4');
			die();
		}
		
		$user = mysql_fetch_array($result);
		
		//if(crypt($contrasenia,$user['contrasenia']) == $user['contrasenia']){
		if($user['password'] === $contrasenia){
			$role_id = $user['role_id'];
			$SQL_Setence = "SELECT * FROM tbl_role WHERE tbl_role.id ='$role_id'";
			$result = mysql_query($SQL_Setence);

			if(!$result){
				header('Location: ../login.php?error=5');
				die();
			}

			$_prioridad = mysql_fetch_array($result);

			session_start();
			$_SESSION['logueado'] = "activa";
			$_SESSION['usuario'] = $user['user'];
			$_SESSION['prioridad'] = $_prioridad['priority'];

			$url_initial = $_prioridad['url_initial'];
			header('Location: ../' . $url_initial);
			die();

		}else{
			header('Location: ../login.php?error=3');
			die();
		}
		
	}
	
	header('Location: index.php');
	die();
?>