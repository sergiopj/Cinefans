
<?php
//We started session
session_start();
?>





<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <!--I add the tag goal-viewport imperative to work with bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <style>

        td{

            padding: 30px;


        }

        th{
            font-weight:bold ;
            padding-left: 30px;

        }
    </style>
</head>
<body>
<!--I add the jquery library-->
<script src="js/jquery.js.js"></script>
<!--Bootstrap with the js file access-->
<script src="js/bootstrap.min.js"></script>





<?php

//If there are session

if(isset($_SESSION['usuario'])){

    $user=$_SESSION['usuario'];

    echo "<div class='row'>
    <div id='panel_log' class='col-md-12 col-xs-12'>
     Bienvenido <strong style='color: #ffffff; font-size: 1.2em;'>$user</strong><br/>
     <a href='cerrar_session.php' style='color: #9afff2'>Cerrar sesión</a>
    </div>";





}

//If not the there is

else{

    ?>


    <!--login-->
    <div class="row">
        <div id="panel_log" class="col-md-10 col-xs-12">
            <form action="login.php" name="login">
                <label for="login">Login:</label>&nbsp;<input  type="text"  name="login" id="login" placeholder="Nombre Usuario"/>
                <input type="text" name="pass"  placeholder="Password"/>
                <button class="log">Enter</button>
            </form>
        </div>

        <!--registration-->

        <div class="col-md-2 col-xs-12" id="aun">
            <a href="registro.php" id="regis">Still not you've registered?</a>
        </div>

    </div>

<?php

}

?>








<!-- photos -->

<img src="img/generales/cine1.jpg" id="carre1" style="position: absolute; top: 10%;left: 20%;" alt=""/>
<img src="img/generales/cine2.jpg" id="carre2" style="position: absolute; top: 10%;right: 20%;" alt=""/>

<!--title-->

<div class="row">

    <div  id="titulo" class="col-xs-12 col-md-12" style="z-index: 9">
        <a href="index.php" id="prin">CineFans</a>
    </div>
</div>





<div class="row">


    <nav class="navbar navbar-default container col-xs-12 col-sm-12 col-md-8 col-lg-8 span8 centering" role="navigation" style="z-index: 10">
        <!-- The logo and the icon that displays the menu are grouped to show them best in them devices mobile -->
        <!-- with the class centering can focus on the web the horizontal menu -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="background-color: #000000;color:white;" href="index.php" id="men"><strong>Inicio</strong></a>
        </div>

        <!-- adapted to all kinds of displays navigation menu -->
        <div  class="collapse navbar-collapse navbar-ex1-collapse span8 centering" id="menu">
            <ul class="nav navbar-nav">
                <li><a href="peliculas.php" class="enlaces">PELÍCULAS </a></li>
                <li><a href="series.php" class="enlaces">SERIES TV</a></li>
                <li><a href="documentales.php" class="enlaces">DOCUMENTALES</a></li>
                <li><a href="top_peliculas.php" class="enlaces">TOP PELÍCULAS</a></li>
                <li><a href="top_series.php" class="enlaces">TOP SERIES</a></li>
                <li><a href="top_docus.php" class="enlaces">TOP DOCUMENTALES</a></li>
            </ul>
        </div>
    </nav>

</div>










<?php
//connect you as user of the bd
$con=mysql_connect('localhost','sergiopj','Ribera12actual!');

//encode text in utf8 important if not will see characters rare interpreted by the browser
mysql_query("SET NAMES 'utf8'");



if($con){
    $obra=$_GET['variable3'];
//Select database
mysql_select_db("cinefans", $con);
//consultation where we want to get the releases
$sql = mysql_query("select texto,autor,titulo,titulo_ori from criticas inner join obras where obras.id_obra=$obra and criticas.id_obra=$obra");

//function to return array with data from a row in the table
$fila = mysql_fetch_assoc($sql);



?>
<table style='position:absolute;width: 50%;left: 24%;top: 40%;border-radius:12px;border-color: #080808;background-color: rgba(27, 109, 133, 0.16);'>

    <?php
    //bucle que devuelve el valor de todas las filas que abarca la consulta sql

    while($fila){

        $autor=$fila['autor'];
        $critica=$fila['texto'];
        $titulo=$fila['titulo'];
        $titulo_ori=$fila['titulo_ori'];



        if (empty($critica)){

            echo "No hay criticas";


        }

        else{

            echo "<tr><th><strong style='color: red;font-size: 1.2em'>$autor</strong>&nbsp;&nbsp;&nbsp;&nbsp;<small>$titulo</small> <small>($titulo_ori)</small></th></tr>
                <tr><td><p>$critica</p></td></tr>";



        }










        //rompo el bucle con un centinela para que recorra la tabla entera
        $fila = mysql_fetch_assoc($sql);
    }


    }

    ?>

</table>





















</body>
</html>