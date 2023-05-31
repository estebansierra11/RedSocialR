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
$sesion=$_SESSION ['correo'];
$query = "SELECT * FROM usuario WHERE correo='$sesion'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);
  $id= $row['id'];
  $nombre = $row['nombre'];
  $apellido = $row['apellido'];



}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> RIGE</title>
    <link rel="stylesheet" href="estilos2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
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
  <div class="p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card">
  <div class="text2">
    <?php  echo $nombre." ".$apellido  ?>
  </div>
  <div class="text2">
    <img class="img-perfil"src="imagenes\1683742941_3da2964ac6f810faee5d38b18a0d20e7.jpg" alt="">
  </div>
  <div class="text2">
    <label class="label"for="">Id</label><br>
<input class="form-control-disabled"type="text" name="" value="<?php  echo $id ?>" disabled>
 </div>
  <div class="text2">
    <label class="label"for="">Nombre</label><br>
<input class="form-control-disabled"type="text" name="" value="<?php  echo $nombre ?>" disabled>
 </div>
 <div class="text2">
   <label class="label"for="">Apellido</label><br>
<input class="form-control-disabled"type="text" name="" value="<?php  echo $apellido ?>" disabled>
</div>
<div class="text2">
  <label class="label"for="">Correo</label><br>
<input class="form-control-disabled"type="text" name="" value="<?php  echo $sesion ?>" disabled>
</div>
<div class="text2">
<button type="submit" class="boton" name="button">Actualizar</button>
</div>

<br>
        </div>
      </div>

    </div>

  </div>


  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
  <script >
  const image = document.querySelector("img"),
  input = document.querySelector("input");

  input.addEventListener("change", () => {
    image.src = URL.createObjectURL(input.files[0]);

  });

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
