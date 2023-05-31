

<?php

include('conexion.php');

if (isset($_POST['enviar'])) {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $query = "INSERT INTO proyecto(Nombre, Descripcion) VALUES ('$nombre', '$descripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }


  header('Location: index.php');

}

?>
