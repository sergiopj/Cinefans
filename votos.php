
<?php
session_start();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votos</title>
</head>

<!--I Add the jquery library-->
<script src="js/jquery.js.js"></script>
<!--I Access to the file bootstrap with the js-->
<script src="js/bootstrap.min.js"></script>

<body>

<?php
    if(isset($_SESSION['usuario']) and isset($_GET['valor_voto'])){

        //i received from $get and $session
         $valor=$_GET['valor_voto'];
         $user=$_SESSION['id_user'];
         $id_obra=$_GET['idpeli'];


        
        //To connect as user of the database
        $con=mysql_connect('xxxxwebhost.com','xxxx','xxxx');

        //Text codifies in utf8 importantly if characters not interpreted by the web navigator
        mysql_query("SET NAMES 'utf8'");

        //If we connect we do the query and select the database

        if($con){

            //select the database
            mysql_select_db("xxxx", $con);

            $sql = mysql_query("insert into puntuaciones(valor,fecha,id_obra,id_user) values($valor,null,$id_obra,$user)");

            //I warn of vote applied and turned to the index.php without losing the session

            echo"<script languaje='javascript'>
                    alert('Has votado');
                    location.href = 'index.php';
                    </script>";

        }

    }

?>

</body>
</html>
