<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<!--Añado la libreria jquery-->
<script src="js/jquery.js.js"></script>
<!--Acceso al archivo bootstrap con el js-->
<script src="js/bootstrap.min.js"></script>

<?php

//comprobamos que nos llega
if(isset($_GET['login']) && isset($_GET['pass'])) {

    //si hay campos vacios lo mandamos al formulario
    if ($_GET['login'] == "" || $_GET['pass'] == "") {

        //si es asi lo mandamos al index

        header('location:index.php');


    }

    //si nos llega pass y login
    else{

        //comprobamos que esta en la base de datos

        //conectarse como usuario de la bd
        $con=mysql_connect('mysql1.000webhost.com','a4376548_sergio','pituspitus');

        //codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
        mysql_query("SET NAMES 'utf8'");

        //si hay conexion
        if($con){

            $usuario=$_GET['login'];
            $contraseña=sha1($_GET['pass']);


            //selecciono base de datos
            mysql_select_db("a4376548_cinefan", $con);
            //consulta donde nos interesa sacar los estrenos
            $sql = mysql_query("SELECT id_user,login,password FROM usuarios WHERE login = '$usuario' and password = '$contraseña'");
            //con esto escapamos caracteres especiales para evitar sql inyection
            mysql_real_escape_string($usuario);
            mysql_real_escape_string($contraseña);


            //funcion para devolver array con datos de una fila de la tabla
            $fila = mysql_fetch_assoc($sql);

            //mirar si el usuario se encuentra ya en mi bd en la tabla usuarios


            $login=$_GET['login'];
            //cifro lo recogido desde $get para que coincida con lo de la bd
            $pass=sha1($_GET['pass']);

            //ciframos en sha para comparar con lo que ya hay cifrado en la bd

            if($login == $fila['login'] && $pass == $fila['password']){

                //guardamos login en session
                echo "estas dentro $login";
                //Creamos sesión
                session_start();
                //Almacenamos el nombre de usuario y su id en una variable de sesión usuario
                $_SESSION['usuario'] = $usuario;
                $_SESSION['id_user'] = $fila['id_user'];
                //Redireccionamos a la pagina pero con la session abierta
                header("Location: index.php");

            }

            else{
                echo"<script languaje='javascript'>
                    alert('Autenticación Incorrecta');
                    location.href = 'index.php';
                    </script>";
            }
        }





        //si falla la conexion

        else{





        }


    }
}
?>

</body>
</html>


