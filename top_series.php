
<?php
session_start();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Top Series TV</title>
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

//If it is session

if(isset($_SESSION['usuario'])){

    $user=$_SESSION['usuario'];

    echo "<div class='row'>
    <div id='panel_log' class='col-md-12 col-xs-12'>
     Bienvenido <strong style='color: #ffffff; font-size: 1.2em;'>$user</strong><br/>
     <a href='cerrar_session.php' style='color: #9afff2'>Cerrar sesión</a>
    </div>";





}

//If it is not session

else{

    ?>
    
    <!--login-->
    <div class="row">
        <div id="panel_log" class="col-md-10 col-xs-12">
            <form action="login.php" name="login">
                <label for="login">Login:</label>&nbsp;<input  type="text"  name="login" id="login" placeholder="Nombre Usuario"/>
                <input type="text" name="pass"  placeholder="Password"/>
                <button class="log">Iniciar</button>
            </form>
        </div>

        <!--new user-->

        <div class="col-md-2 col-xs-12" id="aun">
            <a href="registro.php" id="regis">¿Aún no te has registrado?</a>
        </div>

    </div>

<?php

}

?>


<!-- photos -->

<img src="img/generales/cine1.jpg"  style="position: absolute; top: 6%;left: 20%;" alt=""/>
<img src="img/generales/cine2.jpg"  style="position: absolute; top: 6%;right: 20%;" alt=""/>

<!--title-->

<div class="row">

    <div  id="titulo" class="col-xs-12 col-md-12" style="z-index: 9">
        <a href="index.php" id="prin">CineFans</a>
    </div>
</div>


<div class="row">


    <nav class="navbar navbar-default container col-xs-12 col-sm-12 col-md-8 col-lg-8 span8 centering" role="navigation" style="z-index: 10">
        <!-- The logo and the icon that drop-down of the menu they group to show them better in the mobile devices -->
        <!-- With the class centering I can centre on the web the horizontal menu -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" id="men"><strong>Inicio</strong></a>
        </div>

        <!-- Menu of navigation adapted to all kinds of screens -->
        <div  class="collapse navbar-collapse navbar-ex1-collapse span8 centering" id="menu">
            <ul class="nav navbar-nav">
                <li ><a href="peliculas.php"class="enlaces">PELÍCULAS </a></li>
                <li><a href="series.php" class="enlaces">SERIES TV</a></li>
                <li><a href="documentales.php" class="enlaces">DOCUMENTALES</a></li>
                <li><a href="top_peliculas.php" class="enlaces">TOP PELÍCULAS</a></li>
                <li><a href="top_series.php" style="background-color: #000000;color:white;" class="enlaces">TOP SERIES</a></li>
                <li><a href="top_docus.php" class="enlaces">TOP DOCUMENTALES</a></li>
            </ul>
        </div>
    </nav>

</div>


<h2 class="container-fluid" id="titu_tops"><em>Valoración Series Tv</em></h2>


<!--tv series coll-->

<div id="col_tops">
    
<?php

//To connect as user of the database
$con=mysql_connect('xxxxwebhost.com','xxxx','xxxx');


//Text codifies in utf8 importantly if characters not interpreted by the web navigator
mysql_query("SET NAMES 'utf8'");



if($con){

   //If we connect we do the query and select the database
   
    //i select the database
    mysql_select_db("xxxx", $con);

    $sql=mysql_query("SELECT obras.id_obra,titulo,tipo,puntuaciones.id_obra,foto,avg(valor) as media,truncate(avg(valor),1) as media_2
                          FROM obras
                          INNER JOIN puntuaciones ON obras.id_obra = puntuaciones.id_obra
                          where tipo='serie'
                          group by obras.id_obra
                          order by media desc");


    //Function to return array with information of a row of the table
    $fila = mysql_fetch_assoc($sql);


    echo "<table id='col_top' class='table table-responsive'>";

    while($fila){

        $foto=$fila['foto'];
        $media=$fila['media_2'];
        $titulo=$fila['titulo'];
        $id=$fila['id_obra'];


        echo "<tr><th colspan='2' style='font-size:2em;text-align: center;background-color:#000000;color:white;'>".$fila['titulo']."</th></tr>";
        echo "<tr><td rowspan='2'><img src='img/obras/$foto.jpg'></td>";
        echo "<td><strong>Media Votaciones</strong> <br> <strong style='color: darkred;font-size:2em;position:relative;left:24%'>$media</strong></td></tr>";

        echo "<tr><td><p>Ficha de la Película:</p><a href='ficha.php?variable1=$id' id='criticas' style='position: relative;left:1%;'>$titulo</a></td></tr>";




        //i break while
        $fila = mysql_fetch_assoc($sql);

    }

    echo "</table>";

}

?>

</div>

</body>
</html>
