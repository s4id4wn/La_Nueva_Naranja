<?php

function existsUser($user)
{
	$rowAffected = getUserByAttributeUser($user);
	if( mysql_num_rows($rowAffected) == 0 )
	{
		return false;
	}
	return true;
}
function existsUserById($id)
{
	$rowAffected = getUserById($id);
	if( mysql_num_rows($rowAffected) == 0 )
	{
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

function updateUser($id,$role_id,$password,$name,$last_name,$email,$town,$address,$telephone_number)
{
	$sql_sentence = "UPDATE tbl_user SET ";
	$sql_sentence .= " role_id='$role_id', password='$password', name='$name',";
	$sql_sentence .= " last_name='$last_name', email='$email', town='$town', address='$address', telephone_number='$telephone_number' ";
	$sql_sentence .= " WHERE id = $id";
	$result = mysql_query($sql_sentence);
	return $result;

}
function updateUser2($id,$role_id,$user,$password,$name,$last_name,$email,$town,$address,$telephone_number)
{
	$sql_sentence = "UPDATE tbl_user SET ";
	$sql_sentence .= "role_id='$role_id', user='$user', password='$password', name='$name',last_name='$last_name,'";
	$sql_sentence .= "email='$email',town='$town',address='$address',telephone_number='$telephone_number' WHERE id = $id";
	$result = mysql_query($sql_sentence);
	return $result;
}
		
function getUserById($id)
{
	return getUser($id);
}

function getAllUsers()
{
	$sql_sentence = "SELECT * FROM tbl_user ";
	$result = mysql_query($sql_sentence);
	return $result;
}

function logicDeleteUserById($id)
{
	$sql_sentence = "UPDATE tbl_user SET active ='0' WHERE id ='" . $id . "'";
	$result = mysql_query($sql_sentence);
	return $result;
}

function active($id)
{
	$sql_sentence = "UPDATE tbl_user SET active ='1' WHERE id ='" . $id . "'";
	$result = mysql_query($sql_sentence);
	return $result;
}



function getUserByAttributeUser($user)
{
	$sql_sentence = "SELECT * FROM tbl_user WHERE user='" . $user . "'";
	$result = mysql_query($sql_sentence);
	return $result;
}

function getUser($id)
{
	$sql_sentence = "SELECT * FROM tbl_user WHERE id='" . $id . "'";
	$result = mysql_query($sql_sentence);
	return $result;
}

?>