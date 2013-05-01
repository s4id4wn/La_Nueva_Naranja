
function validateFormOfUser(User)
{
	var is_accepted = false;
	
	User.user.value = User.user.value.trim();
	var user = User.user.value;
	
	User.password.value = User.password.value.trim();
	var password = User.password.value;
	
	User.confirm_password.value = User.confirm_password.value.trim();
	var confirm_password = User.confirm_password.value;
	
	User.name.value = User.name.value.trim();
	var name = User.name.value;

	User.last_name.value = User.last_name.value.trim();
	var last_name = User.last_name.value;
	
	User.email.value = User.email.value.trim();
	var email = User.email.value;
	
	User.repeat_email.value = User.repeat_email.value.trim();
	var repeat_email = User.repeat_email.value;

	User.town.value = User.town.value.trim();
	var town = User.town.value;
	
	User.address.value = User.nuevo.address.trim();
	var address = User.address.value;
	
	User.telephone_number.value = User.telephone_number.value.trim();
	var telephone_number = User.telephone_number.value;
	
	if( this.validateUser(user)==true &
		this.validatePassword(password)==true &
		this.validateConfirmPassword(password,confirm_password)==true &
		this.validateName(name)==true &
		this.validateLastName(last_name)==true &
		this.validateEmail(email)==true &
		this.validateRepeat_email(email,repeat_email)==true &
		this.validateTown(town)==true &
		this.validateAddress(address)==true &
		this.validateTelephoneNumber(telephone_number)==true 
	){
		is_accepted = true;
	}

 return is_accepted;
}

function validateUser(user)
 {
	var is_accepted = false;
	var minimum_length_user = 3;
	var maxim_length_user = 20;
	
	if(user=="")
	{
		$('#error_user').show();
		$('#error_u').text('Usuario es requerido').show();
	}else if(user!="")
	{
		if(user.length < minimum_length_user)
		{
			$('#error_user').show();
			$('#error_u').text('No menor a 3 caracteres').show();		
		}
		else if (user.length > maxim_length_user)
		{
			$('#error_user').show();
			$('#error_u').text('No mayor a 20 caracteres').show(); 
		}
		else
		{
			$('#error_user').hide();
			$('#error_u').hide();
			is_accepted=true;
		}
	}
	return is_accepted;
}

function validatePassword(password)
{
	var is_accepted = false;
	var maxim_length_password = 35;
	
	if(password=="")
	{
		$('#error_password').show();
		$('#error_p').text('Contraseña es requerido').show();
	}
	else if(password!="")
	{
		if (password.length > maxim_length_password)
		{
			$('#error_password').show();
			$('#error_p').text('No mayor a 35 caracteres').show(); 
		}
		else
		{
			$('#error_password').hide();
			$('#error_p').hide();
			is_accepted=true;
		}
	}
	return is_accepted;
}

function validateConfirmPassword(password,confirm_password)
{
	var is_accepted = false;
	var maxim_length_confirm_password = 35;
	
	if(confirm_password=="")
	{
		$('#error_confirm_password').show();
		$('#error_cp').text('Cofirmar Contraseña es requerido').show();
	}
	else if(confirm_password!="")
	{
		if (confirm_password.length > maxim_length_confirm_password)
		{
			$('#error_confirm_password').show();
			$('#error_cp').text('No mayor a 35 caracteres').show(); 
		}
		else
		{
			if(password!=confirm_password)
			{
				$('#error_confirm_password').show();
				$('#error_cp').text('Repetir contraseña exactamente').show();
			}
			else
			{
				$('#error_confirm_password').hide();
				$('#error_cp').hide();
				is_accepted=true;
			}
		}
	}
	return is_accepted ;
}


function validateName(name)
{
	var is_accepted = false;
	
	if(name=="")
	{
		$('#error_name').show();
		$('#error_n').text('Nombres son requeridos').show();
	}
	else if(name!="")
	{
		$('#error_name').hide();
		$('#error_n').hide();
		is_accepted=true;
	}
	return is_accepted;
}


function validateLastName(last_name)
{
	var is_accepted = false;
	
	if(last_name=="")
	{
		$('#error_last_name').show();
		$('#error_ln').text('Apellidos son requeridos').show();
	}
	else if(last_name!="")
	{
		$('#error_last_name').hide();
		$('#error_ln').hide();
		is_accepted=true;
	}
	return is_accepted;
}


function validateEmail(email)
{
	var is_accepted = false;
	
	if(email=="")
	{
		$('#error_email').show();
		$('#error_e').text('Correo es requerido').show();
	}
	else if(email!="")
	{
		/* pattern to detec a valid email*/
		var pattern_email=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	
		if (email.search(pattern_email)!=0)
		{
			$('#error_email').show();
			$('#error_e').text('Correo inválido').show();;
		}
		else
		{
			$('#error_email').hide();
			$('#error_e').hide();
			is_accepted=true;
		}
	}
	return is_accepted;
}

function validateRepeat_email(email,repeat_email)
{
	var is_accepted = false;

	if(repeat_email=="")
	{
		$('#error_repeat_email').show();
		$('#error_re').text('Repetir Correo es requerido').show();
	}
	else if(repeat_email!="")
	{
		/* pattern to detec a valid email*/
		var pattern_email=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	
		if (repeat_email.search(pattern_email)!=0)
		{
			$('#error_repeat_email').show();
			$('#error_re').text('Correo inválido').show();
		}
		else
		{
			if(repeat_email!=email)
			{
				$('#error_repeat_email').show();
				$('#error_re').text('Repetir correo exactamente').show();
			}
			else
			{
				$('#error_repeat_email').hide();
				$('#error_re').hide();
				is_accepted=true;
			}
		}
	}
	return is_accepted;
}

function validateTown(town)
{
	var is_accepted = false;
	if(town=="" || town=="Seleccionar")
	{
		$('#error_town').show();
		$('#error_t').text('Municipio es requerido').show();
	}
	else
	{
		$('#error_town').hide();
		$('#error_t').hide();
		is_accepted=true;
	}
	return is_accepted;
}


function  validateAddress(address)
{
	var is_accepted = false;
	
	if(address=="")
	{
		$('#error_address').show();
		$('#error_a').text('Dirección es requerido').show();
	}
	else if(address!="")
	{
		$('#error_address').hide();
		$('#error_a').hide();
		is_accepted=true;
	}
	return is_accepted;
}


function validateTelephoneNumber(telephone_number)
{
	var is_accepted = false;
	var minimum_length_telephone_number = 7;
	var maxim_length_telephone_number = 10;
	
	if(telephone_number=="")
	{
		$('#error_telephone_number').show();
		$('#error_tl').text('Número telefónico es requerido').show();
	}else if(telephone_number!="")
	{
		/*if is not a telephone number*/
		if(!/^([0-9])*$/.test(telephone_number))
		{
			$('#error_telephone_number').show();
			$('#error_tl').text('Número no válido').show();
		}
		else
		{
			if(telephone_number.length < minimum_length_telephone_number)
			{
				$('#error_telephone_number').show();
				$('#error_tl').text('No menor a 7 caracteres').show();		
			}
			else if (telephone_number.length > maxim_length_telephone_number)
			{
				$('#error_telephone_number').show();
				$('#error_tl').text('No mayor a 10 caracteres').show(); 
			}
			else
			{
				$('#error_telephone_number').hide();
				$('#error_tl').hide();
				is_accepted=true;
			}
		}
	}
	return is_accepted;
}
