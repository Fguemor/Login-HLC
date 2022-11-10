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
  <body class="bg-primary d-flex justify-content-around  vh-100 text-white">
    <!--Muestro en la pantalla Hola + el nombre del usuario recogido en $_Session["usuario"]-->
    <h1>Hola
     <?php 
     echo $_SESSION["usuario"];
     ?>! Bienvenid@ a ServiceWatter</h1>
    
  </body>
</html>