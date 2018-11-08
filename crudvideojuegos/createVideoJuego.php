<?php 

require_once '../conexion.php';

if($_POST) {
    $nombre= $_POST['nombre_videojuego'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO videojuegos (nombre_videojuego, precio, categoria) VALUES ('$nombre', '$precio', '$categoria')";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>Nuevo videojuego añadido</p>";
        echo "<a href='../create.php'><button type='button'>Regresar</button></a>";
        echo "<a href='../bienvenido.php'><button type='button'>Inicio</button></a>";
        echo "<a href='../bienvenido.php'><button type='button'>Inicio</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $mysqli->close();
}

?>