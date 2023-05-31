<?php include('conexion.php')?>
<?php
session_start();

  $correo= $_POST['correo'];
  $contrasena = $_POST['contrasena'];


  $query ="SELECT * FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasena'";
  $result = mysqli_query($conn, $query);


if (mysqli_num_rows($result)>0) {
  $_SESSION['correo']= $correo;
  $row = mysqli_fetch_array($result);
  $_SESSION['id']= $row['id'];





  header('Location: inicio.php');
  exit;
}else {
  echo '
  <script>
  alert("usuario no existe");
  window.location = "index.php";

  </script>
  ';
}



?>
