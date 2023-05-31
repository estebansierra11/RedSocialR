<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title></title>
  </head>
  <body>

  </body>
</html><?php

include("conexion.php");

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $query = "DELETE FROM proyecto WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }


  header('Location: portafolio.php');
}

?>
