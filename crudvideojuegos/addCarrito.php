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

  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Agregar al carrito</title>
  </head>
  <body>

    <fieldset>
      <legend>Agregar videojuego al carrito</legend>

      <form action="actionCarrito.php" method="post">
        <table cellspacing="0" cellpadding="0">

          <?php 
          if($_GET['id']) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM videojuegos WHERE id_videojuego = {$id}";
            $result = $mysqli->query($sql);
            $data = $result->fetch_assoc();
            $id_videojuego = $data['id_videojuego'];
            $nombre_videojuego = $data['nombre_videojuego'];
            $precio = $data['precio'];
            $categoria = $data['categoria'];  
          }
          ?>
          <tr>
            <th>Clave</th>
            <td><input type="text" name="id_videojuego" value="<?php echo "$id_videojuego" ?>" /></td>
          </tr>
          <tr>
            <th>Nombre</th>
            <td><input type="text" name="nombre_videojuego" value="<?php echo "$nombre_videojuego" ?>" disabled/></td>
          </tr>
          <tr>
            <th>Precio</th>
            <td><input type="text" name="precio"  value="<?php echo "$precio" ?>" /></td>
          </tr>
                    <tr>
            <th>Categoria</th>
            <td><input type="text" name="categoria" value="<?php echo "$categoria" ?>" disabled/></td>
          </tr>

          <tr>
            <th>Cantidad</th>
            <td><input type="text" name="cantidad" placeholder="Cantidad" /></td>
          </tr>
          <tr>
            <td><button type="submit">Añadir</button></td>
            <td><a href="../bienvenido.php"><button type="button">Regresar</button></a></td>
          </tr>
        </table>
      </form>

    </fieldset>

  </body>
  </html>