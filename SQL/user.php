<?php

public function existsUser($user)
{
	if(mysql_num_rows(getUserByAttributeUser($user)) != 0 ){
	
		return false;
	}
	return true;
}

function addUser($role_id,$user,$password,$name,$last_name,$email,$town,$address,$telephone_number)
{
	$sql_sentence = "INSERT INTO tbl_user";
	$sql_sentence .= "(role_id,user,password,name,last_name,email,town,address,telephone_number,active)";
	$sql_sentence .= "values";
	$sql_sentence .= "('$role_id','$user','$password','$name','$last_name','$email','$town','$address','$telephone_number','1')";
	$result = mysql_query($sql_sentence);
	return $result;
}

function updateUser($id,$role_id,$user,$password,$name,$last_name,$email,$town,$address,$telephone_number,$active)
{
	$sql_sentence = "UPDATE tbl_user SET ";
	$sql_sentence .= "role_id='$role_id', user='$user', password='$password', name='$name',last_name='$last_name,'";
	$sql_sentence .= "email='$email',town='$town',address='$address',telephone_number='$telephone_number' WHERE id = $id";
	$result = mysql_query($sql_sentence);
	return $result;
}
		
public function getUserById($id)
{
	return getUser($id);
}

public function getAllUsers()
{
	return getActiveUsers();
}

function logicDeleteUser($id)
{
	$sql_sentence = "UPDATE tbl_user SET active ='0' WHERE id ='" . $id"'";
	$result = mysql_query($sql_sentence);
	return $retult;
}


private function getUserByAttributeUser($user)
{
	$sql_sentence = "SELEC * FROM tbl_user WHERE user='" . $user . "'";
	$result = mysql_query($sql_sentence);
	return $result;
}

private function getUser($id)
{
	$sql_sentence = "SELEC * FROM tbl_user WHERE id='" . $id . "'";
	$result = mysql_query($sql_sentence);
	return $result;
}

private function getActiveUsers()
{
	$sql_sentence = "SELECT * FROM tbl_user WHERE active='1'";
	$result = mysql_query($sql_sentence);
	return $result;
}
?>