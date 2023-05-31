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
$query = "SELECT * FROM usuario WHERE id='$sesion'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);
  $id= $row['id'];
  $nombre = $row['nombre'];
  $apellido = $row['apellido'];



}


if (isset($_POST['enviar'])) {
  $nombre2= $_POST['nombre'];
  $descripcion = $_POST['descripcion'];

  $fecha= new DateTime();

  $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];

  $imagen_temporal=$_FILES['archivo']['tmp_name'];
  move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

  $query = "INSERT INTO proyecto(nombre,descripcion,imagen,id_usuario)
                      VALUES('$nombre2','$descripcion','$imagen','$sesion')";
  mysqli_query($conn, $query);
  header('Location: portafolio.php');
}


?>


<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> RIGE</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="eliminar.js"></script>

    <link rel="stylesheet" href="estilos2.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <a href="#">                <img src="./imagenes/album3.png" class='bx bxl-c-plus-plus icon'alt="Logo de la marca" href="index.php"></a>
        <div class="logo_name">Rige</div>

        <i class='bx bx-menu' id="btn" ></i>
    </div>

    <ul class="nav-list">

      <li>

        <a href="inicio.php">
          <i class='bx bx-home-alt'></i>
          <span class="links_name">Inicio</span>
        </a>
         <span class="tooltip">Inicio</span>
      </li>
      <li>
       <a href="portafolio.php">
         <i class='bx bxs-backpack' ></i>
         <span class="links_name">Portafolio</span>
       </a>
       <span class="tooltip">Portafolio</span>
     </li>

     <li>
       <a href="perfil2.php">
         <i class='bx bxs-user-circle'></i>
         <span class="links_name">Perfil</span>
       </a>
       <span class="tooltip">Perfil</span>
     </li>



     <li>
       <a href="cerrarSesion.php">
         <i class='bx bx-log-out' ></i>
         <span class="links_name">Cerrar sesion</span>
       </a>
       <span class="tooltip">Cerrar sesion</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="imagenes\1683742941_3da2964ac6f810faee5d38b18a0d20e7.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name"><?php  echo $nombre." ".$apellido  ?></div>
             <div class="job">Id: <?php  echo $id?></div>
           </div>
         </div>
         <i class='bx bx-user' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <br>
  <br>
  <br>

  <section class="home-section">
    <div class="container5">

    <div class="column7">



      <form class="form" method="post" action="portafolio.php" enctype="multipart/form-data">
         <p class="form-title">CREA TU PROYECTO</p>

         <br>
          <div class="input-container">
            <label class="label">Nombre:</label>
            <input type="text" name="nombre"placeholder="Ingresa el nombre" required>
            <span>
            </span>
        </div>
        <div class="input-container">
          <label class="label">Imagen:</label>
            <input type="file" name="archivo" required >
          </div>
        <div class="input-container">
          <label class="label">Descripcion:</label>
            <textarea name="descripcion" class=""rows="4" cols="44"></textarea>
          </div>
          <div class="text2">
            <button type="submit" class="boton" name="enviar">Guardar</button>

          </div>




     </form>

    </div>
    <div class="column8">


      <p class="form-title">TUS PROYECTOS</p>
      <br>
      <!-- Contenido del segundo div -->
      <table class="styled-table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">IMAGEN</th>




          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM proyecto WHERE id_usuario='$sesion' order by id desc";
          $resultado = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td scope="row"><?php echo $row['id'];?></td>
            <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['descripcion'];?></td>
            <td>
                <img class="imgP"width="100" src="imagenes/<?php echo $row['imagen'];?>" alt="">



        </td>
<td>
  <a href="editar.php?id=<?php echo $row['id']?>" class="btn" alt="">
<i class='fas fa-marker'></i></a>

            </td>
            <td>

              <a onclick="alerta_eliminar(<?php echo $row['id']  ?>)" class="btnDanger">
                <i class="far fa-trash-alt"></i>
              </a>
                        </td>

          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div


  </section>

  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  searchBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
   }
  }
  </script>
</body>
</html>
