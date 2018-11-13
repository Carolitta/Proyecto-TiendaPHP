<?php 
session_start();
require 'conexion.php';
	//Para seguridad multinivel, pero no funciona
$sql = "SELECT id_tipo,tipo FROM tipo_usuario";
$result = $mysqli->query($sql);
$bandera = false;

if(!empty($_POST)){
	$nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
	$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);
	$error = '';

	$sqlUsuario = "SELECT id_usuario FROM usuarios WHERE nombre_usuario='$usuario'";
	$resultUsuario = $mysqli->query($sqlUsuario);
	$rows = $resultUsuario->num_rows;

	if($rows>0){
		$error = "El usuario ya existe!";
	} else{
		$sqlPersonal = "INSERT INTO personal (nombre) VALUES('$nombre') ";
		$resultPersonal = $mysqli->query($sqlPersonal);
		$idPersonal = $mysqli->insert_id;

		$sqlUsuarios = "INSERT INTO usuarios(nombre_usuario,password,id_personal,id_tipo) VALUES('$usuario','$password','$idPersonal',1)"; //1 es usuario y el 2 es administrador.
		$resultUsuarios = $mysqli->query($sqlUsuarios);
		$bandera = true;

			//if($resultUsuario>0)
			//	$bandera = true;
			//else
			//$error = "Error al Registrar";
			//

	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-1.11.1.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

	<script>
		function validarNombre(){
			valor = document.getElementById("nombre").value;
			if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
				alert('Falta llenar el nombre');
				return false;
			} else { return true;}
		}

		function validarUsuario(){
			valor = document.getElementById("usuario").value;
			if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
				alert('Falta llenar el usuario');
				return false;
			} else { return true;}
		}

		function validarPassword()
		{
			valor = document.getElementById("password").value;
			if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
				alert('Falta llenar la contraseña');
				return false;
			} else { 
				valor2 = document.getElementById("con_password").value;

				if(valor == valor2) { return true; }
				else { alert('Las contraseña no coinciden'); return false;}
			}
		}

		function validar(){
			if(validarNombre() && validarUsuario() && validarPassword())
			{
				document.registro.submit();
			}
		}
	</script>

</head>

<body>

	<div class="agileits_header">
		
			<div class="agile-login">
				<ul>
					<li><a href="registro.php"> Crear Cuenta </a></li>
					<li><a href="index.php">Login</a></li>
				</ul>
			</div>
			<div class="product_list_header">  
					<form action="back/registro.php" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form>  
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>


	
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="bienvenido.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>inicio</a></li>
				<li class="active">Crear Cuenta</li>
			</ol>
		</div>
	</div>

	<div class="register">
		<div class="container">
			<h2>Registrate ahora!</h2>
			<div class="login-form-grids">
				<h5>Información Personal</h5>
				<form id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
					<div><input type="text" placeholder="Nombre(s)" id="nombre" name="nombre" required=" " ></div>
					<div><input type="text" placeholder="Usuario" id="usuario" name="usuario" required=" " ></div>
					<div><input type="password" placeholder="Contraseña" id="password" name="password" required=" " ></div>
					<div><input type="password" placeholder="Confirmar Contraseña" id="con_password" name="con_password" required=" " ></div>
					<div><input type="button" value="Register" name="registrar" onClick="validar();"></div> 

				</form>
				



	<?php if($bandera) { ?>
		<h1>Registro exitoso</h1>
		<a href="bienvenido.php">Regresar</a>
	<?php }else{ ?>
		<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>

	<?php } ?>
</body>
</html>
















