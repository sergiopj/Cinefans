<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Satisfactorio</title>
    <!--I add the label put - viewport imprecindible to work with bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
</head>
<body>
    
<!--I Add the jquery library-->
<script src="js/jquery.js.js"></script>
<!--I Access to the file bootstrap with the js-->
<script src="js/bootstrap.min.js"></script>



<?php
//I verify that it comes login, password and re-password
if(isset($_GET['login']) && isset($_GET['pass']) && isset($_GET['re_pass'])){

    //If empty fields come I order it to the form again
    if($_GET['login']=="" || $_GET['pass']=="" || $_GET['re_pass']==""){
        echo"<script languaje='javascript'>
                    alert('Faltan Campos Por rellenar');
                    location.href = 'registro.php';
                    </script>";
    }


    //if no exist empty fields
    else{

        $pass=$_GET['pass'];
        //If the password and the re-password exists and in addition the regular expression is fulfilled, the password is strong
            if(($_GET['pass']==$_GET['re_pass']) && preg_match('/^([A-Z]{1})+([a-z])+([0-9]{1}).{10,20}$/',$pass)){

                    //To connect as user of the database
                    $con=mysql_connect('xxxxwebhost.com','xxxx','xxxx');

                    //Text codifies in utf8 importantly if characters not interpreted by the web navigator 
                    mysql_query("SET NAMES 'utf8'");
                    
                    //select the database
                    mysql_select_db("a4376548_cinefan", $con);
                    
                    //i make the variables
                    $login=$_GET['login'];
                    $pass=$_GET['pass'];
                    $re_pass=$_GET['re_pass'];


                //I need another query to the database to see if the login of the new user registered already exists in our database
                    $sql=mysql_query("select login from usuarios");


                    $fila=mysql_fetch_assoc($sql);

                    //I cross the table with while

                    while($fila){

                        //With this code, I avoid users with login like already they are in my database 

                        if($fila['login']==$login){
                            echo"<script languaje='javascript'>
                            alert('El Nombre de Usuario ya existe');
                            location.href = 'registro.php';
                            </script>";
                        }
                        
                        //If the login is not like anyone of that already we have, the user registers with this consultation in our database
                        else{
                            /*It consults where we put the user and his information in the table users of my bd I code with sha he needs 40 characters in
                            the bd the problem is that this consultation works, only if all the fields are completed in the form*/
                            
                            $sql2 = mysql_query("INSERT INTO usuarios(id_user,login,password,admin)
                            VALUES (NULL, '$login',SHA('$pass'),'no')");

                            echo"<!--login-->

    <div class='row'>
            <div id='panel_log' class='col-md-10 col-xs-12'>
                    <form action='index.php' name='login'>
                        <label for='login'>Login:</label>&nbsp;<input  type='text'  name='login' id='login' placeholder='E-mail'/>
                        <input type='text' name='pass'  placeholder='Password'/>
                        <button class='log'>Iniciar</button>
                    </form>
            </div>

        <!--new user-->

            <div class='col-md-2 col-xs-12' id='aun'>
                <a href='registro.php' id='regis'>¿Aún no te has registrado?</a>
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
            <!-- The logo and the icon that drop-down of the menu they group to show them better in the mobile devices -->
            <!-- With the class centering I can centre on the web the horizontal menu -->
         <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target=''.navbar-ex1-collapse'>
                <span class='sr-only'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' style='background-color: #000000;color:white;' href='index.php' id='men'><strong>Inicio</strong></a>
        </div>

        <!-- Menu of navigation adapted to all kinds of screens -->
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
