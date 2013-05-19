<?php


function getProducts(){

connectBD();

include_once('SQL/product.php');

$content = "";

$result = getAllProducts();

$no_rows_result = 0;
if(mysql_num_rows($result) > $no_rows_result )
{	
	while($user = mysql_fetch_array($result))
	{
		$id = $user['id'];
		$content .= "<tr>";
		$content .= "<td align=\"center\">".$user['id']."</td>";
		$content .= "<td align=\"center\">".$user['brand_id']."</td>";
		$content .= "<td align=\"center\">".$user['name']."</td>";
		$content .= "<td align=\"center\">".$user['price']."</td>";
		$content .= "<td align=\"center\">".$user['description']."</td>"
		$content .= "<td align=\"center\">".$user['amount']."</td>"
		$content .= "<td align=\"center\">".$user['url_image']."</td>";
		if($user['active']==1)
		{
		$value = 'Si';
		$image= 'deactive.png';
		$text_confirm = 'Desactivar';
		$url_action = 'logic_delete_product';
		}else{
		$value = 'No';
		$image= 'active.png';
		$text_confirm = 'Activar';
		$url_action = 'active';
		}
		$content .= "<td align=\"center\">".$value."</td>";
		$content .= "<td><a href=\"PHP/product/".$url_action.".php?id=$id\" onclick=\"return confirm('¿".$text_confirm." producto?')\">";
		$content .=	"<img src=\"Imagenes/$image\" border=\"0\" /></a></td>";
		
		$content .= "<td><a href=\"form_user.php?id=$id\">";
		$content .=	"<img src=\"Imagenes/pencil.png\" border=\"0\" /></a></td>";
		
		$content .= "<td><a href=\"PHP/product/".$url_action.".php?id=$id\" onclick=\"return confirm('¿".$text_confirm." producto?')\">";
		$content .=	"<img src=\"Imagenes/active.png\" border=\"0\" ></a></td>";
		
		$content .= "</tr>";
	}
}
else
{
$content .="<tr>";
$content .="<td>No existen productos</td>";
$content .="</tr>";
}
return $content ;	
}
?>