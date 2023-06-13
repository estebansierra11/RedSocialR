<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['correo'])) {
  echo '
    <script>
    alert("Inicia sesion");
    window.location ="index.php"

    </script>
  ';
  //header("location: index.php");
  session_destroy();
  die();
  // code...
}
$sesion=$_SESSION ['id'];
$nombre = '';
$imagen = '';
$descripcion= '';


if  (isset($_GET['id'])) {
  $idEditar = $_GET['id'];
  $query = "SELECT p.nombre as nombreP,imagen,descripcion, u.id, p.id FROM usuario u INNER JOIN proyecto p  WHERE u.id='$sesion' AND p.id='$idEditar'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombreP'];
    $imagen = $row['imagen'];
    $descripcion = $row['descripcion'];
  }
}


if (isset($_POST['update'])) {
  $idEditar = $_GET['id'];
  $nombre= $_POST['nombre'];
  $descripcion = $_POST['descripcion'];

  $fecha= new DateTime();

  $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];

  $imagen_temporal=$_FILES['archivo']['tmp_name'];
  move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

  $query = "UPDATE proyecto set nombre = '$nombre', imagen = '$imagen', descripcion = '$descripcion'
  WHERE id='$idEditar'";

  mysqli_query($conn, $query);
  header('Location: portafolio.php');


}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos2.css">
    <title></title>
  </head>
  <body>
    <div class="contentEditar">



      <form class="form" action="editar.php?id=<?php echo $_GET['id']; ?>" method="post"  enctype="multipart/form-data">
        <br>
         <p class="form-title">EDITA TU PROYECTO</p>
         <br>
         <div class="input-container">
           <label class="label">ID:</label>
           <input type="text" placeholder="Ingresa el nombre" value="<?php echo $idEditar; ?>"disabled>
           <span>
           </span>
       </div>
          <div class="input-container">
            <label class="label">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>">
            <span>
            </span>
        </div>
        <div class="input-container">

          <label class="label">Imagen:</label>
            <input type="file" name="archivo"  value="<?php echo $imagen; ?>"  required>
          </div>
        <div class="input-container">
          <label class="label">Descripcion:</label>
            <textarea name="descripcion" class=""rows="4" cols="44" ><?php echo $descripcion; ?></textarea>
          </div>

          <div class="text2">
            <button type="submit" class="boton" name="update">Actualizar</button>
            <a href="portafolio.php" class="btn">Regresar</a>


          </div>




     </form>

    </div>
  </body>
</html>
