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
//I get the text of criticism by $get and the id of a movie by $session
//assure me that there are session and that came criticism without being empty

if(isset($_SESSION['usuario'])&& isset($_SESSION['id_obra']) && isset($_GET['autor']) && isset($_GET['contenido']) && !$_GET['autor']=="" && !$_GET['contenido']==""){

   //connect to the database and insert criticism

    //connect as a user of the database
    $con=mysql_connect('localhost','sergiopj','Ribera12actual!');

    //encode text in UTF-8 if not will see rare characters interpreted by the browser
    mysql_query("SET NAMES 'utf8'");

    //prepare the variables
     $usuario=$_SESSION['id_user'];
     $obra=$_SESSION['id_obra'];
     $critica=$_GET['contenido'];
     $autor=$_GET['autor'];

    //If there is a connection
    if($con){

        //Select database
        mysql_select_db("cinefans", $con);
        //consultation where we want to get the releases
        $sql = mysql_query("insert into criticas(texto,autor,fecha,id_obra,id_user) values('$critica','$autor',null,$obra,$usuario)");





        echo"<script languaje='javascript'>
                    alert('Ha Escrito su crítica');
                    location.href = 'index.php';
                    </script>";



    }

    //If there is no connection
    else{



    }
}


else{

    //If the text is empty...

    echo"<script languaje='javascript'>
                    alert('¡Hay campos vacios!');
                    location.href = 'index.php';
                    </script>";

}


?>


</body>
</html>