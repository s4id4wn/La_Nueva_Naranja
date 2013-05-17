<?php


function getUsers(){

connectBD();

include_once('SQL/user.php');

$content = "";

$result = getAllUsers();

$no_rows_result = 0;
if(mysql_num_rows($result) > $no_rows_result )
{	
	while($user = mysql_fetch_array($result))
	{
		$id = $user['id'];
		$content .= "<tr>";
		$content .= "<td align=\"center\">".$user['id']."</td>";
		$content .= "<td align=\"center\">".$user['user']."</td>";
		$content .= "<td align=\"center\">".$user['name']."</td>";
		$content .= "<td align=\"center\">".$user['last_name']."</td>";
		$content .= "<td align=\"center\">".$user['email']."</td>";
		if($user['active']==1)
		{
		$value = 'Si';
		$image= 'deactive.png';
		$text_confirm = 'Desactivar';
		$url_action = 'logic_delete_user';
		}else{
		$value = 'No';
		$image= 'active.png';
		$text_confirm = 'Activar';
		$url_action = 'active';
		}
		$content .= "<td align=\"center\">".$value."</td>";
		$content .= "<td><a href=\"PHP/user/".$url_action.".php?id=$id\" onclick=\"return confirm('¿".$text_confirm." usuario?')\">";
		$content .=	"<img src=\"Imagenes/$image\" border=\"0\" /></a></td>";
		
		$content .= "<td><a href=\"form_user.php?id=$id\">";
		$content .=	"<img src=\"Imagenes/pencil.png\" border=\"0\" /></a></td>";
		
		$content .= "<td><a href=\"PHP/user/".$url_action.".php?id=$id\" onclick=\"return confirm('¿".$text_confirm." usuario?')\">";
		$content .=	"<img src=\"Imagenes/active.png\" border=\"0\" ></a></td>";
		
		$content .= "</tr>";
	}
}
else
{
$content .="<tr>";
$content .="<td>No existen usuarios</td>";
$content .="</tr>";
}
return $content ;	
}
?>