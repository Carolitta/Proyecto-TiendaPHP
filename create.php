<!DOCTYPE html>
<html>
<head>
    <title>Agregar videojuego</title>
</head>
<body>
 
<fieldset>
    <legend>Agregar videojuego</legend>
 
    <form action="crudvideojuegos/createVideoJuego.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="nombre_videojuego" placeholder="Nombre" /></td>
            </tr>     
            <tr>
                <th>Precio</th>
                <td><input type="text" name="precio" placeholder="Precio" /></td>
            </tr>
            <tr>
                <th>Categoria</th>
                <td><input type="text" name="categoria" placeholder="Categoria" /></td>
            </tr>
            <tr>
                <td><button type="submit">Guardar</button></td>
                <td><a href="bienvenido.php"><button type="button">Regresar</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>