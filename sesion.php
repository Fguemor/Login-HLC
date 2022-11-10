
<?php
session_start();
//si no está pulsado el botón recordar de la página login de nuestra empresa
if( !isset($_SESSION["recordar"])){
// Establecer tiempo de vida de la sesión en segundos
    $inactividad = 10;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        //ponemos un contador
        $_SESSION['count']++;

        if($sessionTTL > $inactividad){
            //este para destruir la sesion
            session_destroy();
            //Nos redirije a loging.php
        header("Location: login.html");

             
        }
    }else{
        //sino el contador de la sesión es 0
    $_SESSION['count']=0;
}
    // El siguiente key se crea cuando se inicia sesión
    //mostrara el tiempo
    $_SESSION["timeout"] = time();
}
?>