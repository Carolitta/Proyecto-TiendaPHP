<?php 
 
require_once '../conexion.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM videojuegos WHERE id_videojuego = {$id}";
    $result = $mysqli->query($sql);
 
    $data = $result->fetch_assoc();
 
    $mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Editar videojuego</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Editar Video Juego</legend>
 
    <form action="updateVideoJuego.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Clave</th>
                <td><input type="text" name="id" value="<?php echo $data['id_videojuego'] ?>" /></td>
            </tr>     
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre_videojuego'] ?>" /></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td><input type="text" name="precio" value="<?php echo $data['precio'] ?>" /></td>
            </tr>
            <tr>
                <th>Tamaño</th>
                <td><input type="text" name="categoria" value="<?php echo $data['categoria'] ?>" /></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id_videojuego']?>" />
                <td><button type="submit">Guardar cambios</button></td>
                <td><a href="../index.php"><button type="button">Regresar</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>
 
<?php
}
?>