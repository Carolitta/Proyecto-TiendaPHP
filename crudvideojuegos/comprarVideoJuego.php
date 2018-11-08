<?php 
 
require_once '../conexion.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM pedidos WHERE id_pedido={$id}";
    
    if($mysqli->query($sql) === TRUE) {
    
        echo "<p>Compra realizada exitosamente</p>";
        echo "<a href='../bienvenido.php'><button type='button'>Regresar</button></a>";
    } else {
        echo "Ocurrió un error al realizar la compra" . $mysqli->error;
    }
 
    $mysqli->close();
}
 
?>