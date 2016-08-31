
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Verifiacion</title>
    <!--I add the label put - viewport imprecindible to work with bootstrap-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <style>

        body{
            background-color:#212429;
        }

        h4{
            color:#f9f9f9;
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


    //We verify that the user comes to us and password from the form

    if(isset($_GET['usuario']) && isset($_GET['password'])) {

    //We verify that empty fields from the form 


        if($_GET['usuario']=="" || $_GET['password']==""){

            //If there is algun empty field we order it to the form again and the user is warned him by code javascript
            echo"<script languaje='javascript'>
                    alert('Faltan Campos Por rellenar');
                    location.href = 'admin.html';
                    </script>";

        }

        //If we receive something we have to connect to the database and verify if the received is in the users' table

        else {

            //To connect as user of the database
            $con=mysql_connect('xxxxxwebhost.com','xxxx','xxxx');

            //Text codifies in utf8 importantly if characters not interpreted by the mariner would not appear 
            mysql_query("SET NAMES 'utf8'");

            //If finally it is possible to connect to the database

            if($con) {

                //I select database
                mysql_select_db("xxxxx", $con);

                //If we connect, we prepare the consultation to the users' table, only the user with field admin=yes will accede
                $sql=mysql_query("select login,admin,password from usuarios where admin=\"si\";");



                //We prepare the variables to work mas comfortably
                $usuario=$_GET['usuario'];
                $password=$_GET['password'];
                
                //Since in the database the field password is coded in sha1 we code gathered from the form to compare it
                $sha1=sha1($password);


                //If the quiet user exists, one accedes to the panel of administration of cinefans
                $fila=mysql_fetch_assoc($sql);

                //We use while bucle to cross the table and to search the user received of the form
                while($fila){

                    if($fila['login']==$usuario && $fila['password']==$sha1 ){

                        echo "<h4>Bienvenido $usuario</h4>";

                        //Let's start a session
                        session_start();
                        
                        //We store the user's name and his go in a variable of session user
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['password'] = $fila['password'];

                        //I break the while with a sentry since already I met the user
                        $fila = mysql_fetch_assoc($sql);


                        //I show the panel of management of cinefans
                        <br><br><br><br>
                        <form action="gestion.php">
                            <div id="gestion">
                                <table border="1" class="table-responsive" align="center" style="width: 90%;height: 80%;text-align: center">
                                    <tr><th colspan="2">Gestión Cinefans</th></tr>
                                    <tr><td><select name="menu" style="position:static;" class="list-group-item">
                                                    <option value="obras">Nueva Obra</option>
                                                    <option value="director">Nuevo Director</option>
                                            </select><br><button class="btn btn-primary" style="position:relative;margin-left: -100%">Añadir</button></td>
                                        <td><a href="test_subida.php"><img src="img/controles/subir.jpg" class="img" alt=""></a><br><br>Subir Portada de Obra</td></tr>
                                        <tr><td colspan="2"><a href="Admin.html" class="">Volver a Página de Login</a></td></tr>

                                </table>
                            </div>
                        </form>
<?php

                    }

                    //If the user does not exist or is an administrator, I warn it and order it to the form again

                    else{

                        echo"<script languaje='javascript'>
                        alert('No eres Administrador de Cinefans');
                        location.href = 'admin.html';
                        </script>";

                    }

                }

            }

        }


    }

?>

</body>
</html>
