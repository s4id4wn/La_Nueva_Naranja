
function validateFormOfUser(User)
{
	var is_accepted = false;
	
	if( this.validateUser(User.user.value)==true &
		this.validatePassword(User.password.value)==true &
		this.validateConfirmPassword(User.password.value,User.confirm_password.value)==true &
		this.validateName(User.name.value)==true &
		this.validateLastName(User.last_name.value)==true &
		this.validateEmail(User.email.value)==true &
		this.validateRepeatEmail(User.email.value,User.repeat_email.value)==true &
		this.validateTown(User.town.value)==true &
		this.validateAddress(User.address.value)==true &
		this.validateTelephoneNumber(User.telephone_number.value)==true
	){
		is_accepted = true;
	}

 return is_accepted;
}

function validateUser(user)
 {
	var user = user.trim();
	var is_accepted = false;
	var minimum_length_user = 3;
	var maxim_length_user = 20;
	
	if(user=="")
	{
		$('#error_user').show();
		$('#error_u').text('Usuario es requerido').show();
		$('.error2').hide();
	}else if(user!="")
	{
		if(user.length < minimum_length_user)
		{
			$('#error_user').show();
			$('#error_u').text('No menor a 3 caracteres').show();
			$('.error2').hide();
		}
		else if (user.length > maxim_length_user)
		{
			$('#error_user').show();
			$('#error_u').text('No mayor a 20 caracteres').show(); 
			$('.error2').hide();
		}
		else
		{
			$('#error_user').hide();
			$('#error_u').hide();
			$('.error2').hide();
			is_accepted=true;
		}
	}
	return is_accepted;
}

function validatePassword(password)
{
	var password = password.trim();
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
	var password = password.trim();
	var confirm_password = confirm_password.trim();
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
	var name = name.trim();
	
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
	var last_name = last_name.trim();
	
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
	var email = email.trim();
	
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

function validateRepeatEmail(email,repeat_email)
{
	var is_accepted = false;
	var email = email.trim();
	var repeat_email = repeat_email.trim();

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
	var town = town.trim();
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
	var address = address.trim();
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
	var telephone_number = telephone_number.trim();
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