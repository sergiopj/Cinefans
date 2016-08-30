<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<?php

//si llego aqui es que se han rellenado todos los campos del formulario original, por que todos los campos son obligatorios con la restricion de html




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
    $titulo=$_GET['titulo'];
    $year=$_GET['year'];
    $original=$_GET['original'];
    $musico=$_GET['musico'];
    $fotografia=$_GET['foto'];
    $genero=$_GET['genero'];
    $duracion=$_GET['duracion'];
    $director=$_GET['director'];
    $trailer=$_GET['trailer'];
    $pais=$_GET['pais'];
    $imagen=$_GET['imagen'];
    $sinopsis=$_GET['sinopsis'];
    $reparto=$_GET['reparto'];
    $obra=$_GET['obra'];
    //consulta donde nos interesa sacar los estrenos
    $sql = mysql_query("INSERT INTO obras (titulo,año,pais,titulo_ori,sinopsis,musica,fotogra,genero,duracion,trailer,foto,tipo,id_director,reparto) VALUES('$titulo',$year,'$pais','$original','$sinopsis','$musico','$fotografia','$genero',$duracion,'$trailer','$imagen','$obra',(SELECT id_director from directores where nombre_artistico =\"Ann Druyan\"),'$reparto');");
    //como se ha añadido la nueeva obra en la bd...
    echo "<script languaje='javascript'>
                        alert('Obra $titulo Introducida');
                        location.href = 'Admin.html';
             </script>";

}


//si no hay conexion guardamos los errores en el array $error





?>

</body>
</html>