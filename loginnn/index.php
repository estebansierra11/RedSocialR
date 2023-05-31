<?php
session_start();
if (isset($_SESSION['correo']) ) {
  header("location: inicio.php");
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <title></title>
  </head>
  <body>
    <br>
    <br>
    <br>


    <div class="container p-4">
      <div class="row">
        <div class="col-md-4 mx-auto" >
          <div class="card card-body">


          <form action="validar.php" method="post">

            <br>
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">Correo</label>
              <input name="correo" type="text" class="form-control" value="" placeholder="Ingresa el correo">
            </div>
            <br>
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">contraseña:</label>

              <input name="contrasena" type="password" class="form-control" value="" placeholder="Ingresa la contraseña">
            </div>
            <br>

            <br>
            <div class="text-center">
              <button type="submit" name="entrar" class="btn btn-primary">Entrar</button>

      </button>
            </div>
          </form>




          </div>


          <br>
          <div class="form-group">
            <h3>NOTA:</h3>
            <p>Este es una pequeña red social en donde puedes compartir proyectos con demas personas,
            agregas tus proyectos en la seccion de portafolio y visualizas los proyectos de todas
          las personas en la seccion de inicio, tener en cuenta que esta pequeña red social aun no esta
        terminada</p>
<p>Ingresa con las siguientes credenciales:</p>
<p>Opcion 1: Correo: esteban@gmail.com, contraseña: 123 </p>
<p>Opcion 2: Correo: rafael@gmail.com, contraseña: 123 </p>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
