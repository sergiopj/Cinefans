<?php
session_start()
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validacion de Critica</title>
</head>
<body>
<?php
// The text of the critique comes to me for $get and her go of to peli for $session
// I assure myself that it is session and from that the critique comes without being empty

if(isset($_SESSION['usuario'])&& isset($_SESSION['id_obra']) && isset($_GET['autor']) && isset($_GET['contenido']) && !$_GET['autor']=="" && !$_GET['contenido']==""){

   //We connect to the database and insert the critique

    //To connect as user of the database
    $con=mysql_connect('xxxxwebhost.com','xxxx','xxxx');

    //i select the database
    mysql_select_db("xxxx", $con);

    //Text codifies in utf8 importantly if characters not interpreted by the mariner would not appear 
    mysql_query("SET NAMES 'utf8'");

    //i make the variables
     $usuario=$_SESSION['id_user'];
     $obra=$_SESSION['id_obra'];
     $critica=$_GET['contenido'];
     $autor=$_GET['autor'];

    //If there is connection
    if($con){

        //select the database
        mysql_select_db("xxxx", $con);
        //It query where we are interested in extracting the premieres
        $sql = mysql_query("insert into criticas(texto,autor,fecha,id_obra,id_user) values('$critica','$autor',null,$obra,$usuario)");


        echo"<script languaje='javascript'>
                    alert('Ha Escrito su crítica');
                    location.href = 'index.php';
                    </script>";
    }

    
}

else{
    //If the text comes emptiness...
    echo"<script languaje='javascript'>
                    alert('¡Hay campos vacios!');
                    location.href = 'index.php';
                    </script>";
}


?>


</body>
</html>
