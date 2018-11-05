<?php 
//Iniciamos la sesión para destruirla después
session_start();
//Destruímos la sesión
session_destroy();
//Redirigimos
header('Location: index.php');
 ?>