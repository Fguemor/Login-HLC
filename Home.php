<!--clase Home donde damos paso al panel de nuestra tienda online, y donde controlaremos la sesion-->
<?php
//incluye y evalua el archivo sesion.php
include ("sesion.php");
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="./img/log.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi Tienda Online
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  </head>
  <!--Cabecera de la página-->
   <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AromasTime</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="registrar.html" class="text-decoration-none text-black  fs-6 ">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link disabled text-dark">¡Bienvenido al mundo del aroma que te hace especial!</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <img src="./img/usu.png" class="rounded-circle " height="40"" alt="Eniun">
      
      </form>
      <div class="dropdown">
  <button class="btn btn-primary" type="button" id="dropdownMenuButton">
    <a href="AjusteCuenta.php" class="text-decoration-none text-black  fs-6 "><?php echo $_SESSION["usuario"]; ?>
  </button>

    </div>
  </div>
</nav> 

</html>