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
				
				include_once('SQL/product.php');
				
				if( existsProductById($id) )
				{
					$succesful = updateProduct($id,$role_id,$password_encrypted,$name,$last_name,$email,$town,$address,$telephone_number);

					if( $succesful )
					{
						header('Location: ../../index.php');
					}
				}
		
}
else
{	/* los campos no son por post*/
	echo 'No lo intentes de nuevo';
	header('Location: ../../form_product.php');
	die();
}

?>