<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!--Añado la etiqueta meta-viewport imprecindible para trabajar con bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <style>


        body{

            background-color: #f8f8f8;


        }

        div{

            position: absolute;
            top: 30%;
            left:38%;
        }

        a{


            position: absolute;
            top: 60%;
            left:40%;

        }


    </style>
</head>
<body>
<?php


    if ($_FILES['archivo']["error"] > 0)
    {
        echo "Error: " . $_FILES['archivo']['error'] . "<br>";
        echo "No se ha seleccionado ningúna Imagen";
        echo "<a href='Admin.html'>Volver</a>";
    }
    else
    {

        echo "<div>";

        echo "<h3>El archivo se ha subido correctamente</h3>";

        echo "<p><strong>Datos de subida:</strong></p>";


        echo "<strong>Nombre:</strong> " . $_FILES['archivo']['name'] . "<br>";
        echo "<strong>Tipo:</strong> " . $_FILES['archivo']['type'] . "<br>";
        echo "<strong>Tamaño:</strong> " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
        echo "<strong>Carpeta temporal:</strong> " . $_FILES['archivo']['tmp_name'];

        /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/


        move_uploaded_file($_FILES['archivo']['tmp_name'],

        "img/obras/grandes" . $_FILES['archivo']['name']);

        echo "</div>";




}
 ?>

<br><br><br>
<a href="admin_veri.php" class="btn btn-primary">Volver al panel de gestión de CineFans</a>

</body>
</html>