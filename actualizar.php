<!--Clase donde actualizo los datos del usuario->
<?php
include ("sesion.php");
//recojo el nombre del usuario
  $usuario=$_SESSION["usuario"];
     $dsn = 'mysql:host=localhost;port=3307;dbname=logging';
    $username = 'root';
    $password = 'usuario';

//Realizo la conexión a través de pdo
$pdo = new PDO($dsn, $username, $password);
        //recojo con el Post la contraseña introducida
       $contraseña=$_POST["contraseña"];
       //Convierto la contraseña en cifrada con sha1
       $con=sha1($contraseña);
       //recojo con el Post el nombre a actualizar
       $nombre=$_POST["nombre"];
       //recojo con el POST el apellido
       $apellido=$_POST["apellidos"];
       //recojo con el post el correo
       $correo=$_POST["correo"];
      //Si el botón llamado boton que es el aceptar ha sido pulsado
      if(!empty($_POST["boton"])){
 
//Realizo la actualización de datos con pdo
$sql = "UPDATE usuario SET contraseña=?, nombre=?, apellidos=?, correo_electronico=? WHERE usuario=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$con, $nombre, $apellido, $correo,$usuario]);
    
      //Lo redirijo una vez insertado los datos al login
        header("Location:login.html");
  
}
//Para elimina un usuario si le da al botón de dar de baja al usuario
if(!empty($_POST["eliminar"])){
$exec = $pdo->prepare ("DELETE FROM usuario WHERE usuario=:usuario");
        $exec->bindParam(':usuario',$usuario,PDO::PARAM_STR);
        $exec->execute();
         //Lo redirijo una vez insertado los datos al login
        header("Location:login.html");

}
?>