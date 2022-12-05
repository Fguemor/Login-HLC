<!--Nos redirije a poder actualizar los datos del usuario-->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="./img/log.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi Tienda Online
    </title>
<!--Link al enlace bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        <img src="$imgData" class="rounded-circle " height="40"" alt="Eniun">
      
      </form>
      <div class="dropdown">

    </div>
  </div>
</nav> 
  </head>
  <body>
 <div
        class="bg-white p-5 rounded-5 text-secondary shadow-lg"
        style="width: 125rem"
      >
  <form action="actualizar.php" method="POST">
  
      <h2><em class="text-black ">Configuración Datos Usuario</em></h2>  
    
        <div class="mt-2">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" class="form-input" required/>   
          </div>
          <div class="mt-2">
          <label for="apellido">Apellidos</label>
          <input type="text" name="apellidos" class="form-input" required/>         
          </div>
          <div class="mt-2" >
          <label for="email">Correo electrónico </label>
          <input type="email" name="correo" class="form-input" />
          </div>
          <div class="mt-2" >
          <label for="apellido">Contraseña</label>
          <input type="password" name="contraseña" class="form-input" required/>  
          </div>
          <div class="col-1 col-md-1 col-lg-1 mt-4">
          <input class="form-control bg-primary fw-bold" name="boton"  class="btn" type="submit" value="Aceptar">
          </div>
  </form>
  <!-- Para subir una foto-->
   <form action="upload.php" method="post" enctype="multipart/form-data">
     <h2><em class="text-black">Configuración Imagen Usuario</em></h2>  
        Selecciona una imagen:
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="Subir"/>
        <div class="col-1 col-md-1 col-lg-1 mt-4">
        </div>
      </form>
    <form action="actualizar.php" method="POST">
      <div>
          <!--Enlace para darse de baja-->
          <input class="form-control bg-primary fw-bold col-2" name="eliminar"  class="btn" type="submit" value="Darse de baja">
      </div>
          
    </form>
</div>
</body>
</html>