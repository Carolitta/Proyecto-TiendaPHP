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

		$sqlUsuarios = "INSERT INTO usuarios(nombre_usuario,password,id_personal,id_tipo) VALUES('$usuario','$password','$idPersonal',2)";
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

	<form id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
		<div><label>Nombre:</label><input id="nombre" name="nombre" type="text" ></div>

		<div><label>Usuario:</label><input id="usuario" name="usuario" type="text"></div>

		<div><label>Password:</label><input id="password" name="password" type="password"></div>

		<div><label>Confirmar Password:</label><input id="con_password" name="con_password" type="password"></div>

		<div><input name="registar" type="button" value="Registrar" onClick="validar();"></div> 
		
	</form>

	<?php if($bandera) { ?>
		<h1>Registro exitoso</h1>
		<a href="bienvenido.php">Regresar</a>
	<?php }else{ ?>
		<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>

	<?php } ?>
</body>
</html>
















