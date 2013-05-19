
function validateFormOfProduct(Product)
{
	var is_accepted = false;
	
	if( this.validateBrand(Product.brand.value)==true &
		this.validateName(Product.name.value)==true &
		this.validatePrice(Product.price.value)==true &
		this.validateDescription(Product.description.value)==true &
		this.validateAmount(Product.amount.value)==true &
		this.validateImage(Product.image.value)==true

	){
		is_accepted = true;
	}

 return is_accepted;
}



function validateBrand(brand)
{
	var is_accepted = false;
	var brand = brand.trim();
	if(brand=="" || brand=="Seleccionar")
	{
		$('#error_brand').show();
		$('#error_b').text('Marca es requerido').show();
	}
	else
	{
		$('#error_brand').hide();
		$('#error_b').hide();
		is_accepted=true;
	}
	return is_accepted;
}

function validateName(name)
 {
	var name = name.trim();
	var is_accepted = false;
	var minimum_length_name = 1;
	var maxim_length_name = 45;
	
	if(name=="")
	{
		$('#error_name').show();
		$('#error_n').text('Nombre es requerido').show();
		$('.error2').hide();
	}else if(name!="")
	{
		if( name.length < minimum_length_name )
		{
			$('#error_name').show();
			$('#error_n').text('No menor a 1 caracter').show();
			$('.error2').hide();
		}
		else if (name.length > maxim_length_name )
		{
			$('#error_name').show();
			$('#error_n').text('No mayor a 45 caracteres').show(); 
			$('.error2').hide();
		}
		else
		{
			$('#error_name').hide();
			$('#error_n').hide();
			$('.error2').hide();
			is_accepted=true;
		}
	}
	return is_accepted;
}

function validatePrice(price)
{	
	var is_accepted = false;
	var price = price.trim();


	if( price=="")
	{
		$('#error_price').show();
		$('#error_p').text('El precio es requerido').show();
	}
	else 
	{
	var invalid_price = 0;
	 price = parseFloat(price);
	if(isNaN(price))
	{
	$('#error_price').show();
		$('#error_p').text('El precio debe ser numérico').show();
	}
	else{
	
	
	if( price <= invalid_price ){
		$('#error_price').show();
		$('#error_p').text('El precio debe ser mayor a cero').show();
		}
	else
	{
		$('#error_price').hide();
		$('#error_p').hide();
		is_accepted=true;
	}
	}
		
	}

	return is_accepted;
}

function validateDescription(description)
 {
	var description = description.trim();
	var is_accepted = false;
	var minimum_length_description = 2;
	var maxim_length_description = 200;
	
	if(description=="")
	{
		$('#error_description').show();
		$('#error_d').text('Descripción es requerido').show();
	}
	else if(description !="" )
	{
		if(description.length < minimum_length_description)
		{
			$('#error_description').show();
			$('#error_d').text('No menor a 2 caracteres').show();
		}
		else if (description.length > maxim_length_description)
		{
			$('#error_description').show();
			$('#error_d').text('No mayor a 200 caracteres').show(); 
		}
		else
		{
			$('#error_description').hide();
			$('#error_d').hide();
			is_accepted=true;
		}
	}
	return is_accepted;
}

function validateAmount(amount)
{	
	var is_accepted = false;
	var amount = amount.trim();

	if( amount=="")
	{
		$('#error_amount').show();
		$('#error_a').text('La cantidad es requerida').show();
	}
	else 
	{
	var invalid_amount = 0;
	 amount = parseInt(amount);
	if(isNaN(amount))
	{
	$('#error_amount').show();
		$('#error_a').text('La cantidad debe ser un número entero mayor a cero').show();
	}
	else{
	if( amount <= invalid_amount ){
		$('#error_amount').show();
		$('#error_a').text('La cantidad debe ser mayor a cero').show();
		}
	else
	{
		$('#error_amount').hide();
		$('#error_a').hide();
		is_accepted=true;
	}
	}
		
	}

	return is_accepted;
}

function validateImage(image)
 {
	var image = image.trim();
	var is_accepted = false;
	var minimum_length_image = 1;
	var maxim_length_image = 200;
	
	if(image=="")
	{
		$('#error_image').show();
		$('#error_i').text('La imagen es requerida').show();
	}else if(image!="")
	{
		if(image.length < minimum_length_image)
		{
			$('#error_image').show();
			$('#error_i').text('No menor a 1 caracter').show();
		}
		else if (description.length > maxim_length_image)
		{
			$('#error_image').show();
			$('#error_i').text('Nombre no mayor a 200 caracteres').show(); 
		}
		else
		{
			$('#error_image').hide();
			$('#error_i').hide();
			is_accepted=true;
		}
	}
	return is_accepted;
}

