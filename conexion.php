<?php 
	//echo "Hola prebes!";
	//Para hacer la conexión 
	//(SERVER[IP],DB_USER,PASS_DB,NOMBRE_DB)
	$mysqli = new mysqli("localhost","root","","db_videojuegos");
	if(mysqli_connect_errno()){
		echo "¡Error al establecer conexión con la base de datos!",mysqli_connect_error();
		exit();
	}
	//echo "Estas conectado papu!";
 ?>