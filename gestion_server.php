<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!--I add the tag goal-viewport imperative to work with bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
</head>
<body>


<?php


if ($_FILES['archivo']["error"] > 0)
{
    echo "Error: " . $_FILES['archivo']['error'] . "<br>";
}
else
{


    echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
    echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
    echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
    echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];

    /*now with the move_uploaded_file function we will keep it on the destination that you want*/


    move_uploaded_file($_FILES['archivo']['tmp_name'],

        "img/obras/grandes" . $_FILES['archivo']['name']);

}



?>



</body>
</html>