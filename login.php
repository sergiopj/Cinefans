<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<!--I add the jquery library-->
<script src="js/jquery.js.js"></script>
<!--Bootstrap with the js file access-->
<script src="js/bootstrap.min.js"></script>

<?php

//We check that we get
if(isset($_GET['login']) && isset($_GET['pass'])) {

    //If there are empty fields we sent it to the form
    if ($_GET['login'] == "" || $_GET['pass'] == "") {

        //If is so it sent to the index

        header('location:index.php');


    }

    //If we get pass and login
    else{

        //We see this in the data base

        //connect you as user of the bd
        $con=mysql_connect('localhost','sergiopj','Ribera12actual!');

        //encode text in utf8 important if not will see characters rare interpreted by the browser
        mysql_query("SET NAMES 'utf8'");

        //If there is a connection
        if($con){

            $usuario=$_GET['login'];
            $contraseña=sha1($_GET['pass']);


            //Select database
            mysql_select_db("cinefans", $con);
            //consultation where we want to get the releases
            $sql = mysql_query("SELECT id_user,login,password FROM usuarios WHERE login = '$usuario' and password = '$contraseña'");
            //with this function i can escape special characters to avoid sql inyection
            mysql_real_escape_string($usuario);
            mysql_real_escape_string($contraseña);


            //function to return array with data from a row in the table
            $fila = mysql_fetch_assoc($sql);

            //look if the user is found already in my bd in the table users
            $login=$_GET['login'];

            //I code collected from $get to match it with the DB
            $pass=sha1($_GET['pass']);

            //encrypt in sha to compare with what already is encrypted in the bd

            if($login == $fila['login'] && $pass == $fila['password']){

                //We keep login session
                echo "estas dentro $login";
                //We create session
                session_start();
                //We store the user name and your id in a user session variable
                $_SESSION['usuario'] = $usuario;
                $_SESSION['id_user'] = $fila['id_user'];
                //Redirect to the page but with the session open
                header("Location: index.php");

            }

            else{
                echo"<script languaje='javascript'>
                    alert('Autenticación Incorrecta');
                    location.href = 'index.php';
                    </script>";
            }
        }





        //If the connection fails

        else{





        }


    }
}
?>

</body>
</html>


