<!--Clase para obtener la imagen-->
<?php
include ("sesion.php");
  $usuario=$_SESSION["usuario"];

    //datos de conexión a la bbdd
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'usuario';
    $dbName     = 'logging';
    $port ='3307';
    
    //se crea la conexión a la bbdd
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port);
    
    //se comprueba si se ha conectdo
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //se obtiene la imagen requerida de la base de datos
    $result = $db->query("SELECT image FROM images WHERE usuario = 'fguemor'");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //compilando la imagen
        header("Content-type: image/png"); 
        echo $imgData['image']; 
    }else{
        echo 'Imagen no encontrada...';
    }

?>