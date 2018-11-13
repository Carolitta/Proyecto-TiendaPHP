<?php 
//session_start();
//if (isset($_SESSION['usuario'])) {
//	echo "";
//}else{
//	header("Location: index.php");
//	exit();
//}

/*$sql = mysql_query("SELECT * from usuarios where usuario = '$usuario' and pass = '$password' ");
if ($row = mysql_fetch_array($sql)) 
		{
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../index.php");
		}else
			{
			header("Location: ../bienvenido.php");
			exit();
		}*/
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
	<title>Prebegames</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="input-field"></div>
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
				<li><a href="bienvenido.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Login</li>
			</ol>
		</div>
	</div>
	<div class="login">
		<div class="container">
			<h2>Login</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<input type="text" id="usuario" placeholder="Usuario" name="usuario">
					<input type="password" id="password" name="password" placeholder="Contraseña" required=" " >
					<input type="submit" value="Iniciar sesión" name="login">
					<div style="font-size: 16px; color: #cc0000;">
							<?php echo isset($error)? html_entity_decode(htmlentities($error)): '';  ?>
						</div>
				</form>
			</div>
			<h4>¿No tienes cuenta?</h4>
			<p><a href="registro.php">Registrate Ahora</a>o regresa al<a href="bienvenido.php">Inicio<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
	</div>
</body>
<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
											
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>

<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
</html>