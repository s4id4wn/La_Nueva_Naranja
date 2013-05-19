<?php

if( isset($_POST['Guardar']) &&
	isset($_POST['id']) &&
	isset($_POST['brand']) && trim($_POST['brand'])!='' &&
	isset($_POST['name']) && trim($_POST['name']) &&
	isset($_POST['price']) && trim($_POST['price']) &&
	isset($_POST['description']) && trim($_POST['description']) &&
	isset($_POST['amount']) && trim($_POST['amount']) &&
	isset($_POST['image']) && trim($_POST['image']) 
	)
{
	
				include_once('../lib.php');
			
				connectBD();
				$id = $_POST['id'];
				$brand = $_POST['brand'];
				$name = $_POST['name'];
				$price = $_POST['price'];
				$description = $_POST['description'];
				$amount = $_POST['amount'];
				$image = $_POST['image'];
				
				$archivo_nombre= $_FILES["archivo"]["name"];
				
				include_once('SQL/product.php');
				
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
else
{
	/* los campos no son por post*/
	//header('Location: ../../form_user.php');
	//die();
}

?>