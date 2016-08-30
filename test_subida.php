
<?php

//inicio de sesion

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <title>Title</title>
    <style>
        #gestion{
            position:absolute;
            width: 40%;
            height: 40%;
            top:30%;
            left: 28%;
            align-content: center;
        }

        body{
            background-color:#212429;
        }

        th{
            background-color: #1b6d85;
            color:white;
            text-align: center;
        }



    </style>
</head>
<body>

<form action="subearchivo.php" method="post" enctype="multipart/form-data">




        <div id="gestion">
            <table border="1" class="table-responsive" align="center" style="width: 90%;height: 80%;text-align: center;margin: auto">
                <tr><th colspan="2" style="text-align: center">Subir Portada de Obra al Servidor de Cinefans</th></tr>
                <tr><td><div style="position: relative;left: -6%"><input type="file" name="archivo" style="background-color: transparent;color: #0f0f0f" id="archivo"></div></td><td><div><input type="submit" style="position: relative;left: -12%" class="btn btn-primary" value="Subir archivo"></div></td></tr>
                <td colspan="2"><a href="Admin.html" class="btn btn-primary" style="background-color:#8c8c8c;">Volver a Pantalla de Login</a></td>
            </table>
        </div>






</form>






</body>
</html>