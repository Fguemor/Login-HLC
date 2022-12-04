<!--Clase para subir la foto del usuario-->
<?php
//incluye y evalua el archivo sesion.php
include ("sesion.php");
  $usuario=$_SESSION["usuario"];
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $usuario=$_SESSION["usuario"];
        //datos de conexión a la base de datos
        $dbHost     = "localhost";
        $dbUsername = "root";
        $dbPassword = "usuario";
        $dbName     = "logging";
        $port ="3307";
        //se crea la conexión a la bbdd
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port);
        
        //se comprueba la conexión
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        $dataTime = date("Y-m-d H:i:s");
         //se obtiene la imagen requerida de la base de datos
    $result = $db->query("SELECT image FROM images WHERE usuario = '$usuario'");
    
    if($result->num_rows == 0){
        //se inserta la imagen en la bbdd
        $insert = $db->query("INSERT into images (id,image, created,usuario) VALUES (NULL,'$imgContent', '$dataTime','$usuario')");
    }
        if($insert){
            echo "Se ha subido la imagen correctamente!";
        }else{
            $insert = $db->query("UPDATE images SET image='$imgContent'WHERE usuario = '$usuario' ");
        } 
    }else{
        echo "Seleccione una imagen a subir";
    }
}
?>