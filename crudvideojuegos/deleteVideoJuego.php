<?php 
 
require_once '../conexion.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM videojuegos WHERE id_videojuego={$id}";
    
    if($mysqli->query($sql) === TRUE) {
    
        echo "<p>Videojuego eliminado :C</p>";
        echo "<a href='../bienvenido.php'><button type='button'>Regresar</button></a>";
    } else {
        echo "Ocurrió un error al eliminar" . $mysqli->error;
    }
 
    $mysqli->close();
}
 
?>