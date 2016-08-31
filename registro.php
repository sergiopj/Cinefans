
<?php
session_start();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Cinefans</title>
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

////If it is not session
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

<div style="position: absolute;padding-top:6px;width:25%;height:15%;text-align:center;right:5%;border-radius:5px;box-shadow:10px 10px 10px black;color:#000000;top:67.2%;background-color: rgba(169, 169, 169, 0.44);">Dicha contraseña deberá empezar por <strong><em>una letra mayúscula</em></strong>, letras minúsculas y <strong><em>un número</em></strong>. Como mínimo 10 carácteres y Máximo 20. Ejemplo: Aaaa9aaaaaaaaaa</div>

<!--form-->
<form action="registro_ok.php">

    <table border="1" id="registro">
        <tr><th colspan="2" style="background-color: #000000;"><h2 style="text-align:center;color: #ffffff">Formulario de Alta CineFans</h2></th></tr>

        <tr><td>

        <label for="log">Nombre de Usuario:</label>
        <input type="text" name="login" id="log" maxlength="15" style="position: relative;left: 25%;"/>

        </td>


        </tr>

        <tr><td>

        <label for="pass" title="">Password:</label>
        <input type="password"  name="pass" id="pass" maxlength="15" style="position: relative;left: 37%;"/>

        </td></tr>

        <tr><td>

        <label for="repass">Repite el Password:</label>
        <input type="password"  name="re_pass" id="repass" style="position: relative;left: 25%;"/>

        </td></tr>



        <tr><td colspan="2" style="padding-left:30%; ">

        <button id="butt_form" title="">Registrarme</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" id="butt_form">Borrar Datos</button>

        </td></tr>

    </table>


</form>



</body>
</html>
