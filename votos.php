
<?php
//iniciamos session pues nos hace falta nombre de usuario guardado en $_SESSION

session_start();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<!--Añado la libreria jquery-->
<script src="js/jquery.js.js"></script>
<!--Acceso al archivo bootstrap con el js-->
<script src="js/bootstrap.min.js"></script>
<body>

<?php
    if(isset($_SESSION['usuario']) and isset($_GET['valor_voto'])){

        //lo recogo de $get y de $session
         $valor=$_GET['valor_voto'];
         $user=$_SESSION['id_user'];
         $id_obra=$_GET['idpeli'];


        //conectarse como usuario de la bd
        $con=mysql_connect('mysql1.000webhost.com','a4376548_sergio','pituspitus');

        //codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
        mysql_query("SET NAMES 'utf8'");

        //si hay conexion preparamos la consulta

        if($con){

            //selecciono base de datos
            mysql_select_db("a4376548_cinefan", $con);

            $sql = mysql_query("insert into puntuaciones(valor,fecha,id_obra,id_user) values($valor,null,$id_obra,$user)");

            //aviso de voto y vuelta al index sin perder la session

            echo"<script languaje='javascript'>
                    alert('Has votado');
                    location.href = 'index.php';
                    </script>";



        }





        //nos disponemos a votar , tenemos id_user,id_obra y valor del voto


    }



?>



</body>
</html>