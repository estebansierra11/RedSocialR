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


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> RIGE</title>
    <link rel="stylesheet" href="estilos2.css">
    <!-- Boxicons CDN Link -->
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
       <span class="tooltip">Cerrar Sesion</span>
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

  <section class="home-section">
    <div class="contenedor-inicio">

      <div class="slider">
        <br>
          <div class="slide-track">
            <br>
            <a href="#">
              <div class="slide">
                  <img src="imagenes/1684088353_huracan.jpg" alt="">
              </div>
            </a>
              <div class="slide">
                  <img src="imagenes/1684093241_inundacion.jpg" alt="">
              </div>
              <div class="slide">
                <img src="imagenes/1684088353_huracan.jpg" alt="">
              </div>
              <div class="slide">
                <img src="imagenes/1684093241_inundacion.jpg" alt="">
              </div>
              <div class="slide">
                <img src="imagenes/1684093241_inundacion.jpg" alt="">
              </div>
              <div class="slide">
                <img src="imagenes/1684093241_inundacion.jpg" alt="">
              </div>
              <div class="slide">
                <img src="imagenes/1684093241_inundacion.jpg" alt="">
              </div>


          </div>
      </div>


      <div class="container4">



<div class="column4"><br>
  <br>
  <br>
  <h2>Filtros</h2> <br>
<input type="radio" name="" value=""> Prueba <br>
<input type="radio" name="" value=""> Prueba

        </div>
        <div class="column5">
          <div class="news-cards">

          <?php
          $query = "SELECT p.id, u.nombre, p.nombre as Pnombre,correo, imagen,descripcion from usuario u inner join proyecto p where u.id=p.id_usuario order by p.id desc";
          $resultado = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($resultado)) { ?>

            <div class="card3">

              <img src="imagenes/<?php echo $row['imagen'];?>" alt="" />

              <div class="info-descripcion">
                <h3><?php echo $row['Pnombre'];?></h3>
                <p><?php echo $row['descripcion'];?>
                </p>
                <a href="#"><?php echo $row['correo'];?><i class="fas fa-angle-double-right"></i></a><br>
                <button type="button" class="boton"name="button" alt="VER">VER</button>

              </div>

            </div>




          <?php } ?>
          </div>
        </div>
      </div>


</div>
  </section>

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
</body>
</html>
