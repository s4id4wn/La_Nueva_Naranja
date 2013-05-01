<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
require_once('recaptchalib.php');
$privatekey = "6LdIl-ASAAAAACf7l26DuXLmD5HY3f8TAehaY6fB";
$resp = null;
$error = null;
if ($_POST["recaptcha_response_field"]){
$resp = recaptcha_check_answer($privatekey,
$_SERVER["REMOTE_ADDR"],
$_POST["recaptcha_challenge_field"],
$_POST["recaptcha_response_field"]);
if ($resp->is_valid) {


if (isset($_REQUEST['enviarMen']))
//if "email" is filled out, send email
  {
$para      = $_POST['CorreoElec'];
$nombre	   = $_POST['nombreCont'];
$ape	   = $_POST['apeCont'];
$telefono  = $_POST['teleCont'];
$asunto    = 'Comentario';
$mensaje   = "Mensaje Enviado Por:"."  ".$nombre . $ape ."\r\n". 		  			 "Telefono De contacto".$telefono ."\r\n"		 			 ."Mensaje:" ."\r\n".$_POST['comentCont'];


$cabeceras = 'From: oskr1476@gmail.com' . "\r\n" .
             'Reply-To: oskr1476@gmail.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
 		mail($para, $asunto, $mensaje, $cabeceras);
    echo 'Correo enviado correctamente';
}

 else
//if "email" is not filled out, display the form
  {
  echo "<form method='post' action='contact.php'>
  Email: <input name='email' type='text'><br>
  Subject: <input name='subject' type='text'><br>
  Message:<br>
  <textarea name='message' rows='15' cols='40'>
  </textarea><br>
  <input type='submit'>
  </form>";
  }


} 
else {
$error = $resp->error;
}
}


?>
</body>
</html>