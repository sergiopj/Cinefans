<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<!--I Add the jquery library-->
<script src="js/jquery.js.js"></script>
<!--I Access to the file bootstrap with the js-->
<script src="js/bootstrap.min.js"></script>

<?php

//We verify that it comes login and password
if(isset($_GET['login']) && isset($_GET['pass'])) {

    //If empty fields exist sending to the index.php
    if ($_GET['login'] == "" || $_GET['pass'] == "") {
        header('location:index.php');
    }

    //if i get the correct parameters...
    else{

      
        //To connect as user of the database
        $con=mysql_connect('xxxx.000webhost.com','xxxx','xxxx');

        
        //Text codifies in utf8 importantly if characters not interpreted by the web navigator 
        mysql_query("SET NAMES 'utf8'");

        //If finally it is possible to connect to the database
        if($con){

            $usuario=$_GET['login'];
            $contraseña=sha1($_GET['pass']);

            //select the database
            mysql_select_db("xxxx", $con);
            
            //It consults where we extract the user's login
            $sql = mysql_query("SELECT id_user,login,password FROM usuarios WHERE login = '$usuario' and password = '$contraseña'");
            
            //With this function we escape special characters to avoid sql inyection
            mysql_real_escape_string($usuario);
            mysql_real_escape_string($contraseña);


            //Function to return array with information of a row of the table
            $fila = mysql_fetch_assoc($sql);

            //I verify if the user is already in my database in the table users
            $login=$_GET['login'];
            //I code gathered from $get in order that it coincides with it of the database
            $pass=sha1($_GET['pass']);

            //I code in sha to compare with what already he has coded in the database

            if($login == $fila['login'] && $pass == $fila['password']){

                //welcome message
                echo "estas dentro $login";
                //start session
                session_start();
                //We store the user's name and his id in a variable of session user
                $_SESSION['usuario'] = $usuario;
                $_SESSION['id_user'] = $fila['id_user'];
                //send to the index.php but with the opened session
                header("Location: index.php");
            }

            else{
                echo"<script languaje='javascript'>
                    alert('Autenticación Incorrecta');
                    location.href = 'index.php';
                    </script>";
            }
        }
        //if the connection is failed.....

        else{
        //i make this function in the future

        }


    }
}
?>

</body>
</html>


