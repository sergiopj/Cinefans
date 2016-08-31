
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!--Añado la etiqueta meta-viewport imprecindible para trabajar con bootstrap-->
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


    //comprobamos que nos llega el usuario y pass del formulario

    if(isset($_GET['usuario']) && isset($_GET['password'])) {

    //comprobamos que no nos llegan campos vacios del formulario


        if($_GET['usuario']=="" || $_GET['password']==""){

            //si hay algun campo vacio lo mandamos al formulario de nuevo y se le avisa con codigo javascript
            echo"<script languaje='javascript'>
                    alert('Faltan Campos Por rellenar');
                    location.href = 'admin.html';
                    </script>";

        }

        //si recibimos algo tenemos que conectar a la bd y comprobar si lo recibido se encuentra en la tabla de usuarios

        else {

            //conectarse como usuario de la bd
            $con=mysql_connect('xxxxxwebhost.com','xxxx','xxxx');

            //codificar texto en utf8 importante si no se verian caracteres raros interpretados por el navegador
            mysql_query("SET NAMES 'utf8'");

            //si finalmente se puede conectar a la bd

            if($con) {

                //selecciono base de datos
                mysql_select_db("xxxxx", $con);

                //si conectamos, preparamos la consulta a la tabla de usuarios, solo el usuario con campo admin=si accederá
                $sql=mysql_query("select login,admin,password from usuarios where admin=\"si\";");



                //preparamos las variables para trabajar mas comodo
                $usuario=$_GET['usuario'];
                $password=$_GET['password'];
                //como en la bd el campo password está cifrado en sha1 ciframos lo recogido del form para compararlo
                $sha1=sha1($password);


                //si existe el usuario recogido, se accede al panel de administracion de cinefans
                $fila=mysql_fetch_assoc($sql);

                //creamos bucle para recorrer la tabla y buscar el usuario recibido del formulario
                while($fila){

                    if($fila['login']==$usuario && $fila['password']==$sha1 ){

                        echo "<h4>Bienvenido $usuario</h4>";

                        //Creamos sesión
                        session_start();
                        //Almacenamos el nombre de usuario y su id en una variable de sesión usuario
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['password'] = $fila['password'];

                        



                        //rompo el bucle con un centinela puesto que ya di con el usuario
                        $fila = mysql_fetch_assoc($sql);





                        //muestro el panel de gestion de cinefans


?>

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

                    //si el usuario no existe o no es administrador, lo aviso y lo mando al formulario de nuevo

                    else{

                        echo"<script languaje='javascript'>
                        alert('No eres Administrador de Cinefans');
                        location.href = 'admin.html';
                        </script>";



                    }

                }




            }

            //si no se pudo conectar a la bd creamos mensaje en el array de ERRORES

        }




    }



?>



</body>
</html>
