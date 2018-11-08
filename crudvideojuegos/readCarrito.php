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
  <html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Ver carrito</title>
  </head>
  <body>
    <div >
      <a href="../bienvenido.php"><button type="button">Regresar</button></a>
      <table border="1" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>ID pedido</th>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Precio total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM pedidos";
          $result = $mysqli->query($sql);
          if($_GET['id']) {
            $id = $_GET['id'];

            $sqlVideoJuego = "SELECT * FROM videojuegos WHERE id_videojuego = {$id}";
            $resultVideoJuego = $mysqli->query($sqlVideoJuego);
            
            $data = $resultVideoJuego->fetch_assoc();
            $id_videojuego = $data['id_videojuego'];
            $nombre_videojuego = $data['nombre_videojuego'];
            $precio = $data['precio'];
}
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row['id_pedido']." </td>
                <td>".$id_videojuego." </td>
                <td>".$nombre_videojuego."</td>
                <td>".$row['cantidad']."</td>
                <td>".$precio."</td>
                <td>".$row['total']."</td>
                <td>
                <a href='confirmarCompra.php?id=".$row['id_pedido']."'><button type='button'>Comprar</button></a>
                </td>
                </tr>";
              }
            } else {
              echo "<tr><td colspan='5'><center>No hay videojuegos disponibles</center></td></tr>";
            }   
            ?>

          </tbody>
        </table>
      </div>
    </body>
    </html>