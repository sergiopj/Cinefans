<?php

//It is not necessary to validate the quiet thing since the own form does it thanks to the attributes required of html5

//To connect as user of the database
$con=mysql_connect('xxxwebhost.com','xxxx','xxxx');

//Text codifies in utf8 importantly if characters not interpreted by the mariner would not appear 
mysql_query("SET NAMES 'utf8'");

//If there is connection
if(isset($con)){

    //As if there is connection we insert the information in the database
    //I select the database
    mysql_select_db("xxxx", $con);
    
    //We prepare the parameters gathered for $get and I guard them in variables to work better with them
    $nombre=$_GET['nombre'];
    $nacionalidad=$_GET['nacionalidad'];
    $fecha=$_GET['fecha'];

    //It query where we are interested in extracting the premieres
    $sql = mysql_query("INSERT INTO directores (nombre_artistico,nacionalidad,fecha_naci) VALUES('$nombre','$nacionalidad','$fecha');");
    
    //The new work has been added in the database
    echo "<script languaje='javascript'>
                        alert('Director $nombre Introducido');
                        location.href = 'Admin.html';
             </script>";

}

?>
