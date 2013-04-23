<?php


function validar(){

}
			
function getUserByPk($id){

	$instruccion = "SELEC * FROM tbl_user WHERE id=$id"
	$result = mysql_query($instruccion);
	return $result;
}

function getActivesUsers(){

	$instruccion = "SELECT * FROM tbl_user WHERE active='1'";
	$result = mysql_query($instruccion);
	return $result;
}

function addUser($user,$password,$name,$last_name,$telephone_number,$email,$address){

	$instruccion = "INSERT INTO tbl_user (user,password,name,last_name,telephone_number,email,address,active) values
					('$user','$password','$name','$last_name','$telephone_number','$email','$address','1')";
	$result = mysql_query($instruccion);
	return $result;
}

function updateUser($id,$user,$name,$last_name,$telephone_number,$email,$address){

	$instruccion = "UPDATE tbl_user SET user='$user', name='$name',last_name='$last_name',
					telephone_number='$telephone_number',email='$email',address='$address' WHERE id = $id";
	$resultado = mysql_query($sql);
	return $result;
}

function logicDeleteUser($id){
	
	$instruccion = "UPDATE tbl_user SET active ='0' WHERE id = $id";
	$result = mysql_query($instruccion);
	return $retult;
}



?>