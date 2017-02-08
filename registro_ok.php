<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <!--I add the tag goal-viewport imperative to work with bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
</head>
<body>
<!--I add the jquery library-->
<script src="js/jquery.js.js"></script>
<!--Bootstrap with the js file access-->
<script src="js/bootstrap.min.js"></script>



<?php
//check get 
if(isset($_GET['login']) && isset($_GET['pass']) && isset($_GET['re_pass'])){

    //If there are empty fields we sent it to the form
    if($_GET['login']=="" || $_GET['pass']=="" || $_GET['re_pass']==""){

        echo"<script languaje='javascript'>
                    alert('Faltan Campos Por rellenar');
                    location.href = 'registro.php';
                    </script>";

    }





    //If not there are fields empty
    else{

        $pass=$_GET['pass'];
        //If you meet these conditions, also put expressions regular for password
            if(($_GET['pass']==$_GET['re_pass']) && preg_match('/^([A-Z]{1})+([a-z])+([0-9]{1}).{10,20}$/',$pass)){


                    //connect you as user of the bd
                    $con=mysql_connect('localhost','sergiopj','Ribera12actual!');

                    //encode text in utf8 important if not will see characters rare interpreted by the browser
                    mysql_query("SET NAMES 'utf8'");
                    //Select database
                    mysql_select_db("cinefans", $con);
                    //prepare the variable and thus work more comfortable
                    $login=$_GET['login'];
                    $pass=$_GET['pass'];
                    $re_pass=$_GET['re_pass'];





                //We need another consultation to the bd to see if the login of the new user registered already exists in our bd
                    $sql=mysql_query("select login from usuarios");



                    $fila=mysql_fetch_assoc($sql);

                    //loop to traverse table

                    while($fila){

                        //cwith this code I avoid users with the same login that are already in my bd

                        if($fila['login']==$login){
                            echo"<script languaje='javascript'>
                            alert('El Nombre de Usuario ya existe');
                            location.href = 'registro.php';
                            </script>";


                        }

                        //If the login does not is equal then the user is registered with this consultation in our bd

                        else{
                            //query where we put the user and his data in the table users of my bd I code with sha need 40 characters in the database
                            //the problem is that this query works, only if is complete all the fields in the form
                            $sql2 = mysql_query("INSERT INTO usuarios(id_user,login,password,admin)
                            VALUES (NULL, '$login',SHA('$pass'),'no')");

                            echo"<!--login-->

    <div class='row'>
            <div id='panel_log' class='col-md-10 col-xs-12'>
                    <form action='index.php' name='login'>
                        <label for='login'>Login:</label>&nbsp;<input  type='text'  name='login' id='login' placeholder='E-mail'/>
                        <input type='text' name='pass'  placeholder='Password'/>
                        <button class='log'>Enter</button>
                    </form>
            </div>

        <!--registration-->

            <div class='col-md-2 col-xs-12' id='aun'>
                <a href='registro.php' id='regis'>Still not you've registered?</a>
            </div>

    </div>


    <!-- photos -->

    <img src='img/generales/cine1.jpg' id='carre1' style='position: absolute; top: 10%;left: 20%;' alt=''/>
    <img src='img/generales/cine2.jpg' id='carre2' style='position: absolute; top: 10%;right: 20%;' alt=''/>

    <!--title-->

    <div class='row'>

        <div  id='titulo' class='col-xs-12 col-md-12' style='z-index: 9'>
            <a href='index.php' id='prin'>CineFans</a>
        </div>
    </div>





    <div class='row'>


        <nav class='navbar navbar-default container col-xs-12 col-sm-12 col-md-8 col-lg-8 span8 centering' role='navigation' style='z-index: 10'>
            <!-- Logo and icon that displays the menu are grouped together for better display on mobile devices -->
            <!-- with the class centering can focus on the web the horizontal menu -->
         <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target=''.navbar-ex1-collapse'>
                <span class='sr-only'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' style='background-color: #000000;color:white;' href='index.php' id='men'><strong>Inicio</strong></a>
        </div>

        <!-- adapted to all kinds of displays navigation menu -->
        <div  class='collapse navbar-collapse navbar-ex1-collapse span8 centering' id='menu'>
            <ul class='nav navbar-nav'>
                <li><a href='peliculas.php' class='enlaces'>PELÍCULAS </a></li>
                <li><a href='series.php' class='enlaces'>SERIES TV</a></li>
                <li><a href='documentales.php' class='enlaces'>DOCUMENTALES</a></li>
                <li><a href='top_peliculas.php' class='enlaces'>TOP PELÍCULAS</a></li>
                <li><a href='top_series.php' class='enlaces'>TOP SERIES</a></li>
                <li><a href='top_docus.php' class='enlaces'>TOP DOCUMENTALES</a></li>
            </ul>
        </div>
        </nav>

    </div>";

                            echo "<div id='bienvenido'><h3>¡Usuario <strong style='color: darkred'>$login</strong> bienvenido a CineFans!</h3>";
                            echo "<p style='position: relative;width: 70%;left: 14%;top: 20%'>Lo siguiente que debe hacer es <em>Logearse</em> en nuestro sistema y podrá participar en CineFans, <strong>Criticando</strong> y <strong>Votando</strong> nuestro contenido.</p>";
                            @$fila=mysql_fetch_assoc($sql2);
                            echo "<a href='index.php' id='criticas'>Volver al inicio</a></div>";

                        }

                    }

            }
        else{

            echo"<script languaje='javascript'>
                            alert('La contraseña no cumple los requisitos');
                            location.href = 'registro.php';
                            </script>";


        }
    }


}




?>




</body>
</html>