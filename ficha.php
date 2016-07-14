
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

<img src="img/generales/cine1.jpg" id="carre1"  style="position: absolute; top: 10%;left: 20%;" alt=""/>
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
        <div class="collapse navbar-collapse navbar-ex1-collapse span8 centering" id="menu">
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

//recogo variable de la pagina index
$v1=$_GET['variable1'];

//conectarse como usuario de la bd
$con=mysql_connect('localhost','sergiopj','Ribera12actual!');

//selecciono base de datos
mysql_select_db("cinefans", $con);


//codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
mysql_query("SET NAMES 'utf8'");




if($con) {
    //consulta donde nos interesa sacar todos los datos del titulo de pelicula recibido y nombres de directores
    $sql = mysql_query("SELECT * FROM obras O INNER JOIN directores D USING(id_director)
    WHERE O.id_obra=$v1;");


    //funcion para devolver array con datos de una fila de la tabla
    $fila = mysql_fetch_assoc($sql);

    $titulo = $fila['titulo'];
    $id = $fila['id_obra'];


    while ($fila) {
        echo "<div class='ficha_grande'><table id='ficha_prin' class='table col-xs-12 col-sm-12 col-md-6 col-lg-6' >";
        echo "<tr><th colspan='2' id='title'>" . $fila['titulo'] . "</th></tr>";
        echo "<tr><td rowspan='9'><img style='border:2px solid #000000 ;' id='foto_grande' onclick='javascript:this.width=400;this.height=592' ondblclick='javascript:this.width=165;this.height=242' src='img/obras/grandes/" . $fila['foto'] . ".jpg' width='165' height='242' alt=''/><h4 style='position:relative; left:34%;top:10%;'>Tráiler</h4><a href='" . $fila['trailer'] . "' style='position:relative; left:15%;top:15%;' target='_blank'> <img src='img/redes_sociales/you_tube.png' alt='' style='position'  id='youtube'/></a><a href='criticas.php?variable3=$id' id='criticas'>Críticas Usuarios</a></td></tr>";
        echo "<tr><td><strong>Título Original:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['titulo_ori'] . "</td></tr>";
        echo "<tr><td><strong>Duración:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['duracion'] . "  minutos</td></tr>";
        echo "<tr><td><strong>Año:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['año'] . "</td></tr>";
        echo "<tr><td><strong>País:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['pais'] . "</td></tr>";
        echo "<tr><td><strong>Director:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['nombre_artistico'] . "</td></tr>";
        echo "<tr><td><strong>Género:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['genero'] . "</td></tr>";
        echo "<tr><td><strong><p>Sinopsis:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['sinopsis'] . "</p></td></tr>";
        echo "<tr><td><strong><p>Reparto:&nbsp;&nbsp;&nbsp;&nbsp;</strong>" . $fila['reparto'] . "</p></td></tr>";
        //rompo el bucle para que recorra la tabla entera
        $fila = mysql_fetch_assoc($sql);



    }


    //si hay session se puede votar y criticar
    if (isset($_SESSION['usuario'])) {


        $uno=1;
        $dos=2;
        $tres=3;
        $cuatro=4;
        $cinco=5;


       echo "<tr><td colspan='2' style='background-color: #204d74;'>

        <!--retoco el css pues la tabla cambia al haber sesion-->

        <style>

            #criticas{

            position: absolute;

            top: 80%;



            }


        </style>


        <!--enlaces donde mando el valor del voto-->

        <strong style='color: #ffffff;'>Vota $titulo</strong>&nbsp;&nbsp;&nbsp;

        <a href='votos.php?idpeli=$id&valor_voto=$uno'style='color:white;font-size:1.3em'>1</a>
        <a href='votos.php?idpeli=$id&valor_voto=$dos' style='color: darkgrey;font-size:1.4em'>2</a>
        <a href='votos.php?idpeli=$id&valor_voto=$tres' style='color: grey;font-size:1.5em'>3</a>
        <a href='votos.php?idpeli=$id&valor_voto=$cuatro' style='color:#0a0a08;font-size:1.6em'>4</a>
        <a href='votos.php?idpeli=$id&valor_voto=$cinco' style='color: #0b0b0b;font-size:1.7em'>5</a>
        <a href='criticar.php?idpeli=$id' style='padding-left: 20%;color: white'>Escribir critica de $titulo</a>
        </td></tr>";


    }

}




            ?>










</table></div>




































</body>
</html>