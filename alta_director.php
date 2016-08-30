<?php

//no hace falta validar lo recogido pues lo hace el propio formulario gracias a los atributos required de html5

//conectarse como usuario de la bd
$con=mysql_connect('mysql1.000webhost.com','a4376548_sergio','pituspitus');

//codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
mysql_query("SET NAMES 'utf8'");

//si hay conexion

if(isset($con)){

    //como hay conexion insertamos los datos en la bd
    //selecciono base de datos
    mysql_select_db("a4376548_cinefan", $con);
    //preparamos los parametros recogidos por $get y los guardo en variables para trabajar mejor con ellos
    $nombre=$_GET['nombre'];
    $nacionalidad=$_GET['nacionalidad'];
    $fecha=$_GET['fecha'];

    //consulta donde nos interesa sacar los estrenos
    $sql = mysql_query("INSERT INTO directores (nombre_artistico,nacionalidad,fecha_naci) VALUES('$nombre','$nacionalidad','$fecha');");
    echo $sql;
    //como se ha añadido la nueeva obra en la bd...
    echo "<script languaje='javascript'>
                        alert('Director $nombre Introducido');
                        location.href = 'Admin.html';
             </script>";

}


//si no hay conexion guardamos los errores en el array $error







?>