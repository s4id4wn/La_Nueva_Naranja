<?php

if( isset($_POST['Guardar']) &&
	isset($_POST['id']) &&
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
		if($_POST['email'] == $_POST['repeat_email'])
		{
				include_once('../lib.php');
			
				connectBD();
				$id = $_POST['id'];
				$password_encrypted = crypt($_POST['password']);
				$name = $_POST['name'];
				$last_name = $_POST['last_name'];
				$email = $_POST['email'];
				$town = $_POST['town'];
				$address = $_POST['address'];
				$telephone_number = $_POST['telephone_number'];
				
				include_once('SQL/user.php');
				
				if( existsUserById($id) )
				{
					$role_id = 2;
					
					$succesful = updateUser($id,$role_id,$password_encrypted,$name,$last_name,$email,$town,$address,$telephone_number);

					if( $succesful )
					{
						header('Location: ../../index.php');
					}
				}
		}
}
else
{	/* los campos no son por post*/
	echo 'No lo intentes de nuevo';
	header('Location: ../../form_user.php');
	die();
}

?>