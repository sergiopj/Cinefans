
<?php
//We started session as us makes missing name of user saved in $_SESSIO

session_start();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<!--I add the jquery library-->
<script src="js/jquery.js.js"></script>
<!--Bootstrap with the js file access-->
<script src="js/bootstrap.min.js"></script>
<body>

<?php
    if(isset($_SESSION['usuario']) and isset($_GET['valor_voto'])){

        //i get from $get and $session
         $valor=$_GET['valor_voto'];
         $user=$_SESSION['id_user'];
         $id_obra=$_GET['idpeli'];


        //connect you as user of the bd
        $con=mysql_connect('localhost','sergiopj','Ribera12actual!');

        //encode text in utf8 important if not will see characters rare interpreted by the browser
        mysql_query("SET NAMES 'utf8'");

        //If there is a connection preparamos la consulta

        if($con){

            //Select database
            mysql_select_db("cinefans", $con);

            $sql = mysql_query("insert into puntuaciones(valor,fecha,id_obra,id_user) values($valor,null,$id_obra,$user)");

            //aviso de voto y vuelta al index sin perder la session

            echo"<script languaje='javascript'>
                    alert('Has votado');
                    location.href = 'index.php';
                    </script>";



        }





        //We are preparing to vote, we have id_user, id_obra and value of voting


    }



?>



</body>
</html>