
function validateFormOfUSer(user){

	user.name.value = user.name.value.trim();
	
	if(user.name.value==""){
		
		$(document).ready( function(){
		$('.error').show();
		$('#error_name').show();
	});
	}else if(user.name.value!="")
	{
		$(document).ready( function(){
		$('.error').hide();
		$('#error_name').hide();
		});
	}
	
	user.last_name.value = user.last_name.value.trim();
	
	if(user.last_name.value==""){

		$(document).ready(function(){
		$('.error').show();
			$('#error_last_name').show();
		});
	}else if(user.last_name.value!="")
	{
		$(document).ready( function(){
		$('.error').hide();
		$('#error_name').hide();
		});
	}


	return false;
}

/*no utilizado*/
function validateFormOfUser2( User ){

	var is_accepted = true;
	var message = "";
	
	User.name.value = User.name.value.trim();
	User.last_name.value = User.last_name.value.trim();
	User.email.value = User.email.value.trim();
	User.repeat_email.value = User.repeat_email.value.trim();
	User.password.value = User.password.value.trim();
	User.confirm_password.value = User.confirm_password.value.trim();
	User.municipio.value = User.municipio.value.trim();
	User.localidad.value = User.localidad.value.trim();
	User.address.value = User.address.value.trim();
	User.telephone_number.value = User.telephone_number.value.trim();

	if( User.name.value=="" || User.name.value.length > 20 ){
			message += "Campo nombre es requerido\n";
			var n = document.getElementById("fco");	
		n.innerHTML = "requerido";
	
			is_accepted = false;
		}		
	if( User.last_name.value=="" || User.last_name.value.length > 20 ){
			message += "Campo apellido es requerido\n";
			is_accepted = false;
		}
	if( User.email.value=="" || User.email.value.length > 20 ){
			message += "Campo correo es requerido\n";
			is_accepted = false;
		}
	if( User.repeat_email.value=="" || User.repeat_email.value.length > 20 ){
		message += "Campo repetir correo es requerido\n";
			is_accepted = false;
		}
	if( User.password.value=="" || User.password.value.length > 20 ){
			message += "Campo contraseña es requerido\n";
			is_accepted = false;
		}
	if( User.confirm_password.value=="" || User.confirm_password.value.length > 20 ){
			message += "Campo confirmar contraseña es requerido\n";
			is_accepted = false;
		}
	if( User.municipio.value=="" || User.municipio.value.length > 20 ){
			message += "Campo municipio es requerido\n";
			is_accepted = false;
		}
	if( User.localidad.value=="" || User.localidad.value.length > 20 ){
			message += "Campo localidad es requerido\n";
			is_accepted = false;
		}
	if( User.address.value=="" || User.address.value.length > 20 ){
			message += "Campo dirección es requerido\n";
			is_accepted = false;
		}
	if( User.telephone_number.value=="" || User.telephone_number.value.length > 20 ){
			message += "Campo número telefonico es requerido\n";
			is_accepted = false;
		}
		if(is_accepted==false){
			
		}
	return is_accepted;
}
