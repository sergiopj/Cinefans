<!doctype html>
<html lang="en">
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
//primero comprobamos que nos llega todo
if(isset($_GET['login']) && isset($_GET['pass']) && isset($_GET['re_pass'])){

    //si hay campos vacios lo mandamos al formulario
    if($_GET['login']=="" || $_GET['pass']=="" || $_GET['re_pass']==""){

        echo"<script languaje='javascript'>
                    alert('Faltan Campos Por rellenar');
                    location.href = 'registro.php';
                    </script>";

    }





    //si no hay campos vacios
    else{

        $pass=$_GET['pass'];
        //si se cumplen estas condiciones , tambien metemos expresiones regulares para password
            if(($_GET['pass']==$_GET['re_pass']) && preg_match('/^([A-Z]{1})+([a-z])+([0-9]{1}).{10,20}$/',$pass)){


                    //conectarse como usuario de la bd
                    $con=mysql_connect('localhost','sergiopj','Ribera12actual!');

                    //codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
                    mysql_query("SET NAMES 'utf8'");
                    //selecciono base de datos
                    mysql_select_db("cinefans", $con);
                    //preparo las variables y asi trabajo más comodo
                    $login=$_GET['login'];
                    $pass=$_GET['pass'];
                    $re_pass=$_GET['re_pass'];





                //necesitamos otra consulta a la bd para ver si el login del nuevo usuario registrado ya existe en nuestra bd
                    $sql=mysql_query("select login from usuarios");



                    $fila=mysql_fetch_assoc($sql);

                    //bucle para recorrer la tabla

                    while($fila){

                        // con este codigo evito usuarios con login igual que ya se encuentran en mi bd

                        if($fila['login']==$login){
                            echo"<script languaje='javascript'>
                            alert('El Nombre de Usuario ya existe');
                            location.href = 'registro.php';
                            </script>";


                        }
                        //si el login no es igual entonces el usuario se registra con esta consulta en nuestra bd
                        else{
                            //consulta donde metemos el usuario y sus datos en la tabla usuarios de mi bd cifro con sha necesita 40 caracteres en la bd
                            //el problema es que esta consulta funciona , solo si se completan todos los campos en el formulario
                            $sql2 = mysql_query("INSERT INTO usuarios(id_user,login,password,admin)
                            VALUES (NULL, '$login',SHA('$pass'),'no')");

                            echo"<!--capa de logeo-->

    <div class='row'>
            <div id='panel_log' class='col-md-10 col-xs-12'>
                    <form action='index.php' name='login'>
                        <label for='login'>Login:</label>&nbsp;<input  type='text'  name='login' id='login' placeholder='E-mail'/>
                        <input type='text' name='pass'  placeholder='Password'/>
                        <button class='log'>Iniciar</button>
                    </form>
            </div>

        <!--registro-->

            <div class='col-md-2 col-xs-12' id='aun'>
                <a href='registro.php' id='regis'>¿Aún no te has registrado?</a>
            </div>

    </div>


    <!-- fotos -->

    <img src='img/generales/cine1.jpg' id='carre1' style='position: absolute; top: 10%;left: 20%;' alt=''/>
    <img src='img/generales/cine2.jpg' id='carre2' style='position: absolute; top: 10%;right: 20%;' alt=''/>

    <!--titulo-->

    <div class='row'>

        <div  id='titulo' class='col-xs-12 col-md-12' style='z-index: 9'>
            <a href='index.php' id='prin'>CineFans</a>
        </div>
    </div>





    <div class='row'>


        <nav class='navbar navbar-default container col-xs-12 col-sm-12 col-md-8 col-lg-8 span8 centering' role='navigation' style='z-index: 10'>
            <!-- El logotipo y el icono que despliega el menú se agrupan
                para mostrarlos mejor en los dispositivos móviles -->
            <!-- con el class centering puedo centrar en la web el menu horizontal -->
         <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target=''.navbar-ex1-collapse'>
                <span class='sr-only'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' style='background-color: #000000;color:white;' href='index.php' id='men'><strong>Inicio</strong></a>
        </div>

        <!-- menu de navegacion adaptado a todo tipo de pantallas -->
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