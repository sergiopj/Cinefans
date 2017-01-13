<?php
session_start()
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<?php
//me llega el texto de la critica por $get y la id de a peli por $session
//me aseguro que hay session y de que llega la critica sin estar vacia

if(isset($_SESSION['usuario'])&& isset($_SESSION['id_obra']) && isset($_GET['autor']) && isset($_GET['contenido']) && !$_GET['autor']=="" && !$_GET['contenido']==""){

   //conectamos a la bd e insertamos la critica

    //conectarse como usuario de la bd
    $con=mysql_connect('localhost','sergiopj','Ribera12actual!');

    //codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
    mysql_query("SET NAMES 'utf8'");

    //preparo las variables
     $usuario=$_SESSION['id_user'];
     $obra=$_SESSION['id_obra'];
     $critica=$_GET['contenido'];
     $autor=$_GET['autor'];

    //si hay conexion
    if($con){

        //selecciono base de datos
        mysql_select_db("cinefans", $con);
        //consulta donde nos interesa sacar los estrenos
        $sql = mysql_query("insert into criticas(texto,autor,fecha,id_obra,id_user) values('$critica','$autor',null,$obra,$usuario)");





        echo"<script languaje='javascript'>
                    alert('Ha Escrito su crítica');
                    location.href = 'index.php';
                    </script>";



    }

    //si no hay conexion
    else{



    }
}


else{

    //si el texto viene vacio...

    echo"<script languaje='javascript'>
                    alert('¡Hay campos vacios!');
                    location.href = 'index.php';
                    </script>";

}


?>


</body>
</html>