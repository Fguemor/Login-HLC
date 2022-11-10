<!--Clase donde controlo el registro de usuario y los registo en mi base de datos->
<?php
      //Si el botón de registrar ha sido pulsado
      if(!empty($_POST["boton"])){
      //Para leer realizo el mismo proceso que para escribir, utilizando el
      //fopen, pero poner alfinal el modo lectura:'r'
      $leer=fopen("/home/usuario/Desktop/2DAM/1TRIMESTRE/LibreConfiguracion/lamp/apache2/htdocs/tema1/ProyectoHLC/private/credenciales.txt", "r");
      //utilizo la función fgets para obtener una línea desde el puntero
      // al fichero
    $servidor=fgets($leer);
      //utilizo str_replace para eliminar los "\n"
    $servidor=str_replace("\n","",$servidor);
    $nombreusuario=fgets($leer);
    $nombreusuario=str_replace("\n","",$nombreusuario);
    $password=fgets($leer);
    $password=str_replace("\n","",$password);
    $db=fgets($leer);
    $db=str_replace("\n","",$db);
    $port=fgets($leer);
    $port=str_replace("\n","",$port);
      //cierro el puntero del archivo abierto con el fclose de modo lectura
    fclose($leer);
        //recojo con el Post el usuario introducido
        $usuario=$_POST["usuario"];
        //recojo con el Post la contraseña introducida
       $contraseña=$_POST["contraseña"];
       //Convierto la contraseña en cifrada con sha1
       $con=sha1($contraseña);
       //recojo con el Post el nombre a registrar
       $nombre=$_POST["nombre"];
       //recojo con el POST el apellido
       $apellido=$_POST["apellido"];
       //recojo con el post el correo
       $correo=$_POST["correo"];
       //nueva conexión al servidor mysql
       $conexion = new mysqli($servidor, $nombreusuario, $password, $db,$port);
       //Inserto los nuevos datos recogidos en registrar.php con el método post
       $sql =("INSERT INTO usuario (usuario, contraseña, nombre, apellidos, correo_electronico, administrador) VALUES ('$usuario','$con','$nombre','$apellido','$correo','0')");
        //Recojo los datos de la cosulta en resultados 
      mysqli_query($conexion, $sql);
      //Lo redirijo una vez insertado los datos al login
        header("Location:login.html");
      mysqli_close($conexion);
}
?>