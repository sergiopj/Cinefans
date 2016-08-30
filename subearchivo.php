<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!--Añado la etiqueta meta-viewport imprecindible para trabajar con bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <style>

        div{

            position: absolute;
            width: 60%;
            height: 20%;
            top:30%;
            left: 40%;

        }

    </style>
</head>
<body>
<?php


    if ($_FILES['archivo']["error"] > 0)
    {
        echo "Error: " . $_FILES['archivo']['error'] . "<br>";
        
    }
    else
    {







        /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/

        move_uploaded_file($_FILES['archivo']['tmp_name'],

        "img/obras/" . $_FILES['archivo']['name']);

        echo"<script languaje='javascript'>
                        alert('Archivo Subido');
                        location.href = 'test_subida.php';
                        </script>";




}
 ?>

<br><br><br>
<tr><td><a href="Admin.html" class="btn-primary">Volver al panel de Login</a></td></tr></table></div>

</body>
</html>