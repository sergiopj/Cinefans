
<?php
//iniciamos session
session_start();
?>





<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <!--Añado la etiqueta meta-viewport imprecindible para trabajar con bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
</head>
<body>
<!--Añado la libreria jquery-->
<script src="js/jquery.js.js"></script>
<!--Acceso al archivo bootstrap con el js-->
<script src="js/bootstrap.min.js"></script>


<!--Codigo real de esta pagina-->


<?php

//si hay session

if(isset($_SESSION['usuario'])){

    $user=$_SESSION['usuario'];

    echo "<div class='row'>
    <div id='panel_log' class='col-md-12 col-xs-12'>
     Bienvenido <strong style='color: #ffffff; font-size: 1.2em;'>$user</strong><br/>
     <a href='cerrar_session.php' style='color: #9afff2'>Cerrar sesión</a>
    </div>";





}

//si no la hay

else{

    ?>


    <!--capa de logeo-->
    <div class="row">
        <div id="panel_log" class="col-md-10 col-xs-12">
            <form action="login.php" name="login">
                <label for="login">Login:</label>&nbsp;<input  type="text"  name="login" id="login" placeholder="Nombre Usuario"/>
                <input type="text" name="pass"  placeholder="Password"/>
                <button class="log">Iniciar</button>
            </form>
        </div>

        <!--registro-->

        <div class="col-md-2 col-xs-12" id="aun">
            <a href="registro.php" id="regis">¿Aún no te has registrado?</a>
        </div>

    </div>

<?php

}

?>


<!-- fotos -->

<img src="img/generales/cine1.jpg" id="carre1" style="position: absolute; top: 10%;left: 20%;" alt=""/>
<img src="img/generales/cine2.jpg" id="carre2" style="position: absolute; top: 10%;right: 20%;" alt=""/>

<!--titulo-->

<div class="row">

    <div  id="titulo" class="col-xs-12 col-md-12" style="z-index: 9">
        <a href="index.php" id="prin">CineFans</a>
    </div>
</div>





<div class="row">


    <nav class="navbar navbar-default container col-xs-12 col-sm-12 col-md-8 col-lg-8 span8 centering" role="navigation" style="z-index: 10">
        <!-- El logotipo y el icono que despliega el menú se agrupan
            para mostrarlos mejor en los dispositivos móviles -->
        <!-- con el class centering puedo centrar en la web el menu horizontal -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" id="men"><strong>Inicio</strong></a>
        </div>

        <!-- menu de navegacion adaptado a todo tipo de pantallas -->
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


<!-- tabla para mostar las peliculas en cartelera -->


<!--capa principal columna de tops-->

<div id="col_tops">
<?php
//conectarse como usuario de la bd
$con=mysql_connect('localhost','sergiopj','Ribera12actual!');

//codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
mysql_query("SET NAMES 'utf8'");



if($con){

    //si conectamos hacemos la consulta y seleccionamos la bd

    //selecciono base de datos
    mysql_select_db("cinefans", $con);

    $sql=mysql_query("SELECT obras.id_obra,titulo,tipo,puntuaciones.id_obra,foto,avg(valor) as media,truncate(avg(valor),1) as media_2
                          FROM obras
                          INNER JOIN puntuaciones ON obras.id_obra = puntuaciones.id_obra
                          where tipo='serie'
                          group by obras.id_obra
                          order by media desc");


    //funcion para devolver array con datos de una fila de la tabla
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




        //rompo el bucle con un centinela para que recorra la tabla entera
        $fila = mysql_fetch_assoc($sql);



    }

    echo "</table>";




}



?>


</div>



















</body>
</html>