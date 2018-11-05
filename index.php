<?php 
require('conexion.php');
	//Inciamos la sesión, se guarda en  $_SESSION
session_start();
	//Preguntamos si existe una sesión
if(isset($_SESSION["id_usuario"])){
		//Redirigimos a una página
	header("Location: bienvenido.php");
}
if(!empty($_POST)){
	$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		//Para cachar los errores
	$error = '';
		//Investigar cómo cifrar la contraseña aquí

	$sql = "SELECT id_usuario,id_tipo FROM usuarios WHERE nombre_usuario ='$usuario' AND password ='$password'";
		//Para que la query se ejecute
		//Le paso la query sql a la conexión
		//y se guarda en resultado
	$result = $mysqli->query($sql);
	//Separar en filas nuestro resultado[numero]
	//(if (!$result) {
  //  trigger_error('Invalid query: ' . $mysqli->error);
	//}	

	$rows = $result->num_rows;

	if($rows>0){
		$row = $result->fetch_assoc();
		echo "$row";
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['tipo_usuario'] = $row['	id_tipo'];
		header("Location: bienvenido.php");
	}else{
		$error = "Nombre de usuario o contraseña inválidos";
	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicia sesión</title>
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body background="img/personajes.png">
	<div class="container">
		<div class="row">
			<div class="col m12">
				<center>
				<img src="img/logo.png" alt="Logo de game universe">
			</center>
			</div>
		</div>
		<!--Inicia formulario de logueo-->
		<div class="row">
			<div class="col m12">	
				<div class="card ">
					<div class="card-content">
						<span class="card-title">Inicia sesión</span>
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="input-field">
								<i class="material-icons prefix">account_circle</i>
								<input id="usuario" name="usuario" type="text">
							<label for="usuario">Usuario </label>
							</div>

							<div class="input-field">
								<i class="material-icons prefix">vpn_key</i>
								<input id="password" name="password" type="password">
								<label for="password">Contraseña </label>
							</div>

							<div>
								<input class="btn grey darken-4" name="login" value="Iniciar sesión" type="submit">
							</div><br>
						<div style="font-size: 16px; color: #cc0000;">
							<?php echo isset($error)? html_entity_decode(htmlentities($error)): '';  ?>
						</div>
						</form>

						<div class="card-action">
							<a class="registro" href="registro.php">¿Aún no te has registrado? Regístrate ahora</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!--Termina formulario de logueo-->
	</div>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/materialize.min.js"></script>
</html>








