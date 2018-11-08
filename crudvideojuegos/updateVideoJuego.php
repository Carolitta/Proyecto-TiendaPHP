<?php  
require_once '../conexion.php';
 
if($_POST) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE videojuegos SET nombre_videojuego = '$nombre', precio = '$precio', categoria = '$categoria' WHERE id_videojuego = {$id}";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>Videojuego actualizado</p>";
        echo "<a href='editVideoJuego.php?id=".$id."'><button type='button'>Regresar</button></a>";
        echo "<a href='../index.php'><button type='button'>Ir al inicio</button></a>";
    } else {
        echo "Ocurrió un error al actualizar". $mysqli->error;
    }
 
    $mysqli->close();
 
}
 
?>