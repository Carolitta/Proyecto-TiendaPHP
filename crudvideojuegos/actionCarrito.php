<?php 
  session_start(); //Inicia una nueva sesión o reanuda la existente
  require_once '../conexion.php';
//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
  if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
  }
//Comprobando si el usuario es admin 
  $idUsuario = $_SESSION['id_usuario'];
  $sqlAdmin = "SELECT * FROM usuarios WHERE id_usuario = '$idUsuario'";
  $resultAdmin = $mysqli->query($sqlAdmin);
  $rowAdmin = $resultAdmin->fetch_assoc();
  $esAdmin = "$rowAdmin[id_tipo]";

if($_POST) {   
    $id_videojuego = $_POST['id_videojuego'];
    $cantidad= $_POST['cantidad'];
    $precio = $_POST['precio'];
    $precioTotal = $cantidad*$precio;
    $sql = "INSERT INTO pedidos(id_usuario, id_videojuego, cantidad, total) VALUES ($idUsuario, '$id_videojuego', '$cantidad',$precioTotal)";

    if($mysqli->query($sql) === TRUE) {
        echo "<p>Videojuego añadido al carrito</p>";
        echo "<a href='readCarrito.php?id=".$id_videojuego."'><button type='button'>Ver carrito</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $mysqli->close();
}

?>