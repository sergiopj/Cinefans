<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta Obra</title>
</head>
<body>

<?php
//If I come here it is that there have been refilled all the fields of the original form, for which all the fields are obligatory with the restricion of html

//To connect as user of the database
$con=mysql_connect('xxxxwebhost.com','xxxx','xxxx');

//Text codifies in utf8 importantly if characters not interpreted by the web navigator 
mysql_query("SET NAMES 'utf8'");

//If finally it is possible to connect to the database
if(isset($con)){

  // Since there is connection we insert the information in the bd 
  // I select database
    mysql_select_db("xxxx", $con);
    
    //We prepare the parameters gathered for $get and I guard them in variables to work better with them
    
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
    
    //It query where we are interested in extracting the premieres
    $sql = mysql_query("INSERT INTO obras (titulo,año,pais,titulo_ori,sinopsis,musica,fotogra,genero,duracion,trailer,foto,tipo,id_director,reparto) VALUES('$titulo',$year,'$pais','$original','$sinopsis','$musico','$fotografia','$genero',$duracion,'$trailer','$imagen','$obra',(SELECT id_director from directores where nombre_artistico =\"Ann Druyan\"),'$reparto');");
    
    //Since the new work has been added in the database
    echo "<script languaje='javascript'>
                        alert('Obra $titulo Introducida');
                        location.href = 'Admin.html';
             </script>";

}
?>

</body>
</html>
