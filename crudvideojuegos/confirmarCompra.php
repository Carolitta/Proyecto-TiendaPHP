<?php 
 
require_once '../conexion.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pedidos WHERE id_pedido = {$id}";
    $result = $mysqli->query($sql);
    $data = $result->fetch_assoc();
    $mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Finalizar compra</title>
</head>
<body>
 
<h3>¿Seguro que deseas comprar el videojuego?</h3>
<form action="comprarVideoJuego.php" method="post"> 
    <input type="hidden" name="id" value="<?php echo $data['id_pedido'] ?>" />
    <button type="submit">Sí, comprar videojuego</button>
    <a href="index.php"><button type="button">Regresar</button></a>
</form>
</body>
</html>
 
<?php
}
?>