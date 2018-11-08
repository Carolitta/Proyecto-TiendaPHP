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
    <title>Ver videojuegos</title>
  </head>
  <body>
    <div >
      <a href="../bienvenido.php"><button type="button">Regresar</button></a>
      <table border="1" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoria</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM videojuegos";
          $result = $mysqli->query($sql);

          if ( $esAdmin == 2 ) {
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row['id_videojuego']." </td>
                <td>".$row['nombre_videojuego']."</td>
                <td>".$row['precio']."</td>
                <td>".$row['categoria']."</td>
                <td>
                <a href='editVideoJuego.php?id=".$row['id_videojuego']."'><button type='button'>Editar</button></a>
                <a href='confirmDeleteVideoJuego.php?id=".$row['id_videojuego']."'><button type='button'>Eliminar</button></a>
                </td>
                </tr>";
              }
            } else {
              echo "<tr><td colspan='5'><center>No hay videojuegos disponibles</center></td></tr>";
            }   
          }else{
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row['id_videojuego']." </td>
                <td>".$row['nombre_videojuego']."</td>
                <td>".$row['precio']."</td>
                <td>".$row['categoria']."</td>
                <td>
                <a href='addCarrito.php?id=".$row['id_videojuego']."'><button type='button'>Añadir al carrito</button></a>
                </td>
                </tr>";
              }
            } else {
              echo "<tr><td colspan='5'><center>No hay videojuegos disponibles</center></td></tr>";
            }   

          }
          ?>

        </tbody>
      </table>
    </div>
  </body>
  </html>