<!--Damos paso al panel de nuestra tienda online, y donde controlaremos la sesion-->
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
            <a href="AjusteCuenta.php" class="text-decoration-none text-black  fs-6 "><?php echo $_SESSION["usuario"]; ?></a>
          </button>

      </div>
  </div>
</nav> 

    <body>
    <div class="container">
    <div class="row">
                  <?php
                  //Realizo la conexión con PDO
                  $contraseña = "usuario";
                  $usuario = "root";
                  $nombre_base_de_datos = "logging";
                  try {
                      $base_de_datos = new PDO('mysql:host=localhost;port=3307;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
                      $base_de_datos->query("set names utf8;");
                      $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
                      $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                  } catch (Exception $e) {
                      echo "Ocurrió algo con la base de datos: " . $e->getMessage();
                  }
                  ?>
                  <?php
                  //Cuántos productos mostrar por página
                  $productosPorPagina = 40;
                  // Por defecto es la página 1
                  $pagina = 1;
                  if (isset($_GET["pagina"])) {
                      $pagina = $_GET["pagina"];
                  }
                  // El límite es el número de productos por página
                  $limit = $productosPorPagina;
                  // El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
                  $offset = ($pagina - 1) * $productosPorPagina;
                  // Necesitamos el conteo para saber cuántas páginas vamos a mostrar
                  $sentencia = $base_de_datos->query("SELECT count(*) AS conteo FROM productos");
                  $conteo = $sentencia->fetchObject()->conteo;
                  // Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
                  $paginas = ceil($conteo / $productosPorPagina);

                  // Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
                  $sentencia = $base_de_datos->prepare("SELECT * FROM productos LIMIT ? OFFSET ?");
                  $sentencia->execute([$limit, $offset]);
                  $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
                  //Y más abajo los dibujamos...
                  ?>
      <!--Muestro la paginación-->
    <div class="col-xs-12">
        <h1>Productos</h1>
        <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> productos disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination pagination-sm">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./Home.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./Home.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./Home.php?pagina=<?php echo $pagina + 1 ?>
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!--Creamos la tabla de productos-->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Aroma</th>
                
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo $producto->precio ?></td>
                    <td><?php echo $producto->aroma ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
      <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> productos disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination ">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li class="page-item">
                        <a href="./Home.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./Home.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                  <li class="page-item">
                        <a href="./Home.php?pagina=<?php echo $pagina + 1 ?>
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    
    </div>
</div>
</body>
</html>