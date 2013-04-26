<?php

if( isset($_POST['user']) && trim($_POST['user'])!='' &&
	isset($_POST['password']) && trim($_POST['password'])!='' &&
	isset($_POST['confirm_password']) && trim($_POST['confirm_password']) &&
	isset($_POST['name']) && trim($_POST['name']) &&
	isset($_POST['last_name']) && trim($_POST['last_name']) &&
	isset($_POST['email']) && trim($_POST['email']) &&
	isset($_POST['repeat_email']) && trim($_POST['repeat_email']) &&
	isset($_POST['town']) && trim($_POST['town']) &&
	isset($_POST['address']) && trim($_POST['address']) &&
	isset($_POST['telephone_number']) && trim($_POST['telephone_number']) 
	)
{
	if($_POST['password'] == $_POST['confirm_password'])
	{
	
		if($_POST['email'] == $_POST['repeat_email'])
		{
			include_once('../lib.php');
		
			connectBD();
			
			$user = $_POST['user'];
			//$password_encrypted = crypt($_POST['password']);
			$password = $_POST['password'];
			$name = $_POST['name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$town = $_POST['town'];
			$address = $_POST['address'];
			$telephone_number = $_POST['telephone_number'];
			
			include_once('../../SQL/user.php');
			
			if(!existsUser($user))
			{
				//$succesful = addUser($role_id,$user,$password_encrypted,$name,$last_name,$email,$town,$address,$telephone_number);
				$succesful = addUser($role_id,$user,$password,$name,$last_name,$email,$town,$address,$telephone_number);
				
				if(mysql_num_rows($succesful)==1)
				{
					$succesful_action = true;
				}
				else
				{
					/*no se agregó bien el usuario en la base de datos*/
				}
			}
			else
			{
				/*existe el usuario*/
			}
		}
		else
		{
			/*correos diferentes*/
		}
	}
	else
	{
		/*las contrasenias son diferentes*/
	}
}
else
{	/* los campos no son por post*/
	echo 'No lo intentes de nuevo';
}

if(isset($succesful_action) && $succesful_action == true){
// header('Location: ConsultarUsuarios.php');		//***********redireccionar a todos los usuarios
die();
}
?>