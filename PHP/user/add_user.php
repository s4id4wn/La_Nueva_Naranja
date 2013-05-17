<?php

if( isset($_POST['Guardar']) &&
	isset($_POST['user']) && trim($_POST['user'])!='' &&
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
	$succesful = "";
	if($_POST['password'] == $_POST['confirm_password'])
	{
		if($_POST['email'] == $_POST['repeat_email'])
		{
	
				include_once('../lib.php');
			
				connectBD();
				$user = $_POST['user'];
				$password = $_POST['password'];
				$password_encrypted = crypt($_POST['password']);
				$name = $_POST['name'];
				$last_name = $_POST['last_name'];
				$email = $_POST['email'];
				$town = $_POST['town'];
				$address = $_POST['address'];
				$telephone_number = $_POST['telephone_number'];
				
				include_once('SQL/user.php');
				
				if(!existsUser($user))
				{
					$role_client = 2;
					$succesful = addUser($role_client,$user,$password_encrypted,$name,$last_name,$email,$town,$address,$telephone_number);

					header('Location: ../../index.php');
				}
				else
				{
					/*existe el usuario*/
					//echo 'Existe user';
					header('Location: ../../form_user.php?exists_user=El usuario existe&user='.$user.'&password='.$password.'&name='.$name.'&last_name='.$last_name.'&email='.$email.'&town='.$town.'&address='.$address.'&telephone_number='.$telephone_number);
					die();
				}
		}
	}
}
else
{
	/* los campos no son por post*/
	//header('Location: ../../form_user.php');
	//die();
}

?>