<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require 'conexion.php'; //Agregamos el script de Conexión
	
//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];

	//Consultamos los datos del Usuario
	$sql = "SELECT u.id_usuario, p.nombre FROM usuarios AS u INNER JOIN personal AS p ON u.id_usuario=p.id_personal WHERE u.id_usuario = '$idUsuario'";

	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();

	//Comprobando si el usuario es admin 
	$sqlAdmin = "SELECT * FROM usuarios WHERE id_usuario = '$idUsuario'";
	$resultAdmin = $mysqli->query($sqlAdmin);
	$rowAdmin = $resultAdmin->fetch_assoc();
	$esAdmin = "$rowAdmin[id_tipo]";
	
	echo "$esAdmin";

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>

		<?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?>

		<a href="logout.php">Cerrar sesión</a>

		<br><br>
		<?php
		if ( $esAdmin == 2 ) {
			?>
			<div>
				<a href="create.php"><button type="button">Añadir videojuego</button></a>
				<br><br>
				<a href="crudvideojuegos/readVideoJuego.php"><button class="btn" type="button">Ver videojuegos</button></a>
			</div>
			<?php		
		}else{
			?>
			<a href="crudvideojuegos/readVideoJuego.php"><button class="btn" type="button">Ver videojuegos</button></a>
		</div>
		<?php  }?>

		<?php

		$sqlPedido = "SELECT * FROM pedidos";
		$resultPedido = $mysqli->query($sqlPedido);
		$rows = $resultPedido->num_rows;
		$data = $resultPedido->fetch_assoc();
		$error = "";
		if($rows<0){
			$error = "";
		} else{
			echo "

			";
		} 
		?>

		
		
	</body>
	</html>
