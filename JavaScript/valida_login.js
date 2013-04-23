
function validateForm( User ){

	var is_accepted = true;
	var message = "";
	
	if( User.user.value.trim()=="" || User.user.value.length > 8 ){

			message += "Campo nombre es requerido\n";
			is_accepted = false;
		}
		
	if( User.password.value.trim()=="" || User.password.value.length > 8 ){

			message += "Campo apellido es requerido\n";
			is_accepted = false;
		}
		
		if(is_accepted==true){
		
		User.user.value = User.user.value.trim();
		User.password.value = User.password.value.trim();
		}
		alert(message);
		
	return is_accepted;
	
}