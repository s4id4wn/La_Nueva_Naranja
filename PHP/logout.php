<?php 
   
 //Es necesario inicializar la sesi�n antes de destruirla
 session_start();
 //Elimina todas las variables de la sesi�n 
 session_unset(); 
 session_destroy();
 
 $cdestino = "Location:../index.php";
 header($cdestino);
 exit();

?>
