<?php
//creo el directorio private donde dentro de él guardaré las credenciales
//le doy los permisos 755
mkdir("./private", 0755);
//creación de fichero en modo escritura
//utilizo fopen para crear el fichero y lo abro en modo escritura
$file=fopen("/home/usuario/Desktop/2DAM/1TRIMESTRE/LibreConfiguracion/lamp/apache2/htdocs/tema1/ProyectoHLC/private/credenciales.txt", "w") ;
//Escribo en el fichero las credenciales de la base de datos
//Utilizo fwrite para escribir el fichero en modo
//binario seguro.
//fwrite(apunto al fichero creado con fopen, escribo la cadena 
// concatenando el simbolo de fin de linea  )
fwrite($file, "localhost" . PHP_EOL);
fwrite($file, "root" . PHP_EOL);
fwrite($file, "usuario" . PHP_EOL);
fwrite($file, "logging" . PHP_EOL);
fwrite($file, "3307" . PHP_EOL);
//Cierro el puntero del archivo abierto con el fclose de modo escritura
fclose($file);
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
//Le asigno los permisos 644 al fichero, con chmod pasando 
//la ruta y el permiso a asignar
chmod("/home/usuario/Desktop/2DAM/1TRIMESTRE/LibreConfiguracion/lamp/apache2/htdocs/tema1/ProyectoHLC/private/credenciales.txt", 0644);
    //recogemos el usuario introducido
    $usuario=$_POST["usuario"];
    //recogemos la contraseña introducida
    $contraseña=$_POST["contraseña"];
    $recordarsesion=$_POST["recordar"];
    //guardo la contraseña de manera cifrada
    //Utilizo la función sha1()
    $con=sha1($contraseña);
    //Utilizo la sintaxis orientada a objetos
    //recojo en la variable conexión la nueva conexión  con el servidor mysql
    $conexion = new mysqli($servidor, $nombreusuario, $password, $db,$port);
    //Realizo la consulta donde busco  en mi tabla usuario que el usuario sea el usuario añadido 
    //y la contraseña sea la contraseña añadida
    $sql =("SELECT * FROM usuario WHERE usuario='$usuario' AND contraseña = '$con'");
    //Recojo en la variable resultado la consulta anterior a la base de datos
    //con mysqli::query
    $resultado=$conexion->query($sql);
    //el numero de filas del resultado lo recojo en la variable $num
    $num=$resultado->num_rows;
    
//Utilizamos un if para saber que el botón de 
//entrar está pulsado, recogemos este dato con el POST
if(!empty($_POST["botonentrar"])){
    //Si al pulsar el botón, no se rellenan los campors
    //muestro que faltan datos por rellenar
    if(empty($_POST["usuario"])and empty($_POST["contraseña"])){
        //Cuando los campos estén vacíos voy a mostrar un mensaje 
        //que los campos están vacíos
        echo "Los campos están vacíos";
    
    //Si el numero de fila es mayor que 0, es que existe el usuario y la contraseña por lo 
    //tanto, lo redirijo  a la página home
    }else if($num>0){
        //Inicio la sesión
       session_start();
       //Guardo en variables globales el usuario y el checkbox de recordar 
       //usuario para utilizarlo en la sesiones
        $_SESSION["usuario"] = $usuario;
        $_SESSION["recordar"]=$recordarsesion;
        //Recojo el id de la sesión en la variable sesion
        $sesion=session_id();
        session_regenerate_id();

        $sesionNueva = session_id();
        //Inserto los datos de usuario contraseña e id de la sesión
         $sql =("INSERT INTO sesion (usuario, contraseña,id_sesion) VALUES ('$usuario','$con','$sesionNueva')");
        mysqli_query($conexion, $sql);
         //Una vez entre, con usuario y contraseña me redirije a HOME
         //con la funcion header
        header("Location: Home.php");
            
        //Si no, muestro que se ha equivocado en usuario o contraseña
        } else {
            echo '<div class="alert alert-danger">Usuario o Contraseña Incorrecto</div>';
        }
        
    }


?>