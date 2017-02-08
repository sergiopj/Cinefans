<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!--Add the label meta-viewport imperative to work with bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <style>

        body{
            background-color:#f8f8f8;
        }

        #cerrar{
            position: absolute;
            top:1%;
            right: 30%;


        }

        h4{

            color:black;
            text-align: center;

        }

        #gestion{
            position:absolute;
            width: 30%;
            height: 30%;
            top:40%;
            left: 35%;
        }

        button{
            position: relative;
            left: 45%;
            bottom: 10%;

        }

        select{

            position: relative;
            left: 38%;
            top: 20%;

        }

        th{
            background-color: #1b6d85;
            color:white;
            text-align: center;
        }

    </style>
</head>
<body>


<?php
    //We check that the user and pass of the form comes

    if(isset($_GET['usuario']) && isset($_GET['password'])) {

    //We check that we not get empty form fields


        if($_GET['usuario']=="" || $_GET['password']==""){

            //If there is any field empty we sent it to the form again and it alerts you with javascript code
            echo"<script languaje='javascript'>
                    alert('Faltan Campos Por rellenar');
                    location.href = 'admin.html';
                    </script>";

        }
        
        //If we receive something we have to connect to the database and check whether it received is in the users table
        
        else {

            //connect as a user of the database
            $con=mysql_connect('localhost','sergiopj','Ribera12actual!');

            //encode text in UTF-8 if not will see rare characters interpreted by the browser
            mysql_query("SET NAMES 'utf8'");

            //If finally you can connect to the DB          
            if($con) {

                //Select database
                mysql_select_db("cinefans", $con);

                //If connect, prepare the check to the table of users, only the user with field admin = if access
                $sql=mysql_query("select login,admin,password from usuarios where admin=\"si\";");


                //We prepare the variables to work more comfortable
                $usuario=$_GET['usuario'];
                $password=$_GET['password'];
                //as in the database password is encrypted in sha1 we encrypt collected form to compare it
                $sha1=sha1($password);


                //If there is the user picked, is access to the panel of administration of cinefans
                $fila=mysql_fetch_assoc($sql);

                //create loop to traverse the table and search the user received from the form
                while($fila){

                    if($fila['login']==$usuario && $fila['password']==$sha1 ){

                        echo "<h4>Bienvenido Administrador $usuario</h4>";
                        echo "<a href='admin.html' id='cerrar' class=\"btn btn-primary\">Cerrar Sessión</a> ";

                        //break the loop with a sentry since already di with the user
                        $fila = mysql_fetch_assoc($sql);

                        //show cinefans management panel
?>

                        <br><br><br><br>
                        <form action="gestion.php">
                            <div id="gestion">
                                <table border="1" class="table-responsive" align="center" style="width: 90%;height: 80%;text-align: center">
                                    <tr><th colspan="2">Gestión Cinefans</th></tr>
                                    <tr><td><select name="menu" style="position:static;" class="list-group-item">
                                                    <option value="obras">Nueva Obra</option>
                                                    <option value="cine">Nuevo Cine</option>
                                                    <option value="premio">Nuevo Premio</option>
                                                </select><br><button class="btn btn-primary" style="position:relative;margin-left: -100%">Añadir</button></td>
                                        <td><a href="test_subida.html"><img src="img/controles/subir.jpg" class="img" alt=""></a><br><br>Subir Portada de Obra</td></tr>

                                </table>
                            </div>
                        </form>




<?php




                    }

                    //If the user does not exist or is not an administrator, I notice it and send it to the form again

                    else{

                        echo"<script languaje='javascript'>
                        alert('No eres Administrador de Cinefans');
                        location.href = 'admin.html';
                        </script>";



                    }
                    
                }
                



            }

            //If it could not connect to the database we create message in the errors array
            
        }




    }



?>



</body>
</html>