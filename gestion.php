<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <title>Gestion</title>
    <style>
    
        #obra{
            position: relative;
            width: 35%;
            height: 100%;
            left: 32%;
            }

        body {
                background-color:#212429;
        }

        legend{
                background-color: #1b6d85;
                color:white;
                text-align: center;
        }

    </style>
</head>
<body>

<?php

//I prepare the variable with gathered in the list of the form
$menu=$_GET['menu'];


//If the quiet thing is obras

    if($menu == 'obras'){

?>

    <h2 style="text-align: center;color: white" class="modal-title">Formulario Alta de Nueva Obra</h2><br><br><br>

        <form action="alta_obra.php" role="form" style="position:static;top: 20%;">
            <div id="obra">
            <fieldset class="scheduler-border" style="background-color:darkgrey">
                <legend class="scheduler-border">Completa todos los campos de la nueva Obra</legend><br>
                <div class="form-group"><label for="1">Título de la Obra</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="50" id="1" name="titulo"></div>
                <div class="form-group"><label for="2">Año de lanzamiento</label><input class="form-control" style="margin-left: 0.5%" type="number" required min="1900" max="2300" id="2" name="year"></div>
                <div class="form-group"><label for="4">Título original</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="50" id="4" name="original"></div>
                <div class="form-group"><label for="6">Músico</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="30" id="6" name="musico"></div>
                <div class="form-group"><label for="7">Fotografía</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="30" id="7" name="foto"></div>
                <div class="form-group"><label for="8">Género</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="30" id="8" name="genero"></div>
                <div class="form-group"><label for="9">Duración</label><input class="form-control" style="margin-left: 0.5%" type="number" required min="10" max="500" id="9" name="duracion"></div>
                <div class="form-group"><label for="11">Trailer (enlace youtube)</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="60" id="11" name="trailer"></div>
                <div class="form-group"><label for="13">Director</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="30" id="13" name="director"></div>
                <div class="form-group"><label for="23">Nombre Imagen</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="30" id="23" name="imagen"></div>
                <div class="form-group"><label for="3">País</label><select class="list-group-item" name="pais">
                        <option value="AF">Afganistán</option>
                        <option value="AL">Albania</option>
                        <option value="DE">Alemania</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antártida</option>
                        <option value="AG">Antigua y Barbuda</option>
                        <option value="AN">Antillas Holandesas</option>
                        <option value="SA">Arabia Saudí</option>
                        <option value="DZ">Argelia</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaiyán</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrein</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BE">Bélgica</option>
                        <option value="BZ">Belice</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermudas</option>
                        <option value="BY">Bielorrusia</option>
                        <option value="MM">Birmania</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia y Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brasil</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="BT">Bután</option>
                        <option value="CV">Cabo Verde</option>
                        <option value="KH">Camboya</option>
                        <option value="CM">Camerún</option>
                        <option value="CA">Canadá</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CY">Chipre</option>
                        <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comores</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, República Democrática del</option>
                        <option value="KR">Corea</option>
                        <option value="KP">Corea del Norte</option>
                        <option value="CI">Costa de Marfíl</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croacia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="DK">Dinamarca</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egipto</option>
                        <option value="SV">El Salvador</option>
                        <option value="AE">Emiratos Árabes Unidos</option>
                        <option value="ER">Eritrea</option>
                        <option value="SI">Eslovenia</option>
                        <option value="España" selected>España</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Etiopía</option>
                        <option value="FJ">Fiji</option>
                        <option value="PH">Filipinas</option>
                        <option value="FI">Finlandia</option>
                        <option value="FR">Francia</option>
                        <option value="GA">Gabón</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GD">Granada</option>
                        <option value="GR">Grecia</option>
                        <option value="GL">Groenlandia</option>
                        <option value="GP">Guadalupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GY">Guayana</option>
                        <option value="GF">Guayana Francesa</option>
                        <option value="GN">Guinea</option>
                        <option value="GQ">Guinea Ecuatorial</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="HT">Haití</option>
                        <option value="HN">Honduras</option>
                        <option value="HU">Hungría</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IQ">Irak</option>
                        <option value="IR">Irán</option>
                        <option value="IE">Irlanda</option>
                        <option value="BV">Isla Bouvet</option>
                        <option value="CX">Isla de Christmas</option>
                        <option value="IS">Islandia</option>
                        <option value="KY">Islas Caimán</option>
                        <option value="CK">Islas Cook</option>
                        <option value="CC">Islas de Cocos o Keeling</option>
                        <option value="FO">Islas Faroe</option>
                        <option value="HM">Islas Heard y McDonald</option>
                        <option value="FK">Islas Malvinas</option>
                        <option value="MP">Islas Marianas del Norte</option>
                        <option value="MH">Islas Marshall</option>
                        <option value="UM">Islas menores de Estados Unidos</option>
                        <option value="PW">Islas Palau</option>
                        <option value="SB">Islas Salomón</option>
                        <option value="SJ">Islas Svalbard y Jan Mayen</option>
                        <option value="TK">Islas Tokelau</option>
                        <option value="TC">Islas Turks y Caicos</option>
                        <option value="VI">Islas Vírgenes (EEUU)</option>
                        <option value="VG">Islas Vírgenes (Reino Unido)</option>
                        <option value="WF">Islas Wallis y Futuna</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italia</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japón</option>
                        <option value="JO">Jordania</option>
                        <option value="KZ">Kazajistán</option>
                        <option value="KE">Kenia</option>
                        <option value="KG">Kirguizistán</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="LA">Laos</option>
                        <option value="LS">Lesotho</option>
                        <option value="LV">Letonia</option>
                        <option value="LB">Líbano</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libia</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lituania</option>
                        <option value="LU">Luxemburgo</option>
                        <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                        <option value="MG">Madagascar</option>
                        <option value="MY">Malasia</option>
                        <option value="MW">Malawi</option>
                        <option value="MV">Maldivas</option>
                        <option value="ML">Malí</option>
                        <option value="MT">Malta</option>
                        <option value="MA">Marruecos</option>
                        <option value="MQ">Martinica</option>
                        <option value="MU">Mauricio</option>
                        <option value="MR">Mauritania</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">México</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldavia</option>
                        <option value="MC">Mónaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MZ">Mozambique</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Níger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk</option>
                        <option value="NO">Noruega</option>
                        <option value="NC">Nueva Caledonia</option>
                        <option value="NZ">Nueva Zelanda</option>
                        <option value="OM">Omán</option>
                        <option value="NL">Países Bajos</option>
                        <option value="PA">Panamá</option>
                        <option value="PG">Papúa Nueva Guinea</option>
                        <option value="PK">Paquistán</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Perú</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PF">Polinesia Francesa</option>
                        <option value="PL">Polonia</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="Reino Unido">Reino Unido</option>
                        <option value="CF">República Centroafricana</option>
                        <option value="CZ">República Checa</option>
                        <option value="ZA">República de Sudáfrica</option>
                        <option value="DO">República Dominicana</option>
                        <option value="SK">República Eslovaca</option>
                        <option value="RE">Reunión</option>
                        <option value="RW">Ruanda</option>
                        <option value="RO">Rumania</option>
                        <option value="RU">Rusia</option>
                        <option value="EH">Sahara Occidental</option>
                        <option value="KN">Saint Kitts y Nevis</option>
                        <option value="WS">Samoa</option>
                        <option value="AS">Samoa Americana</option>
                        <option value="SM">San Marino</option>
                        <option value="VC">San Vicente y Granadinas</option>
                        <option value="SH">Santa Helena</option>
                        <option value="LC">Santa Lucía</option>
                        <option value="ST">Santo Tomé y Príncipe</option>
                        <option value="SN">Senegal</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leona</option>
                        <option value="SG">Singapur</option>
                        <option value="SY">Siria</option>
                        <option value="SO">Somalia</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="PM">St Pierre y Miquelon</option>
                        <option value="SZ">Suazilandia</option>
                        <option value="SD">Sudán</option>
                        <option value="SE">Suecia</option>
                        <option value="CH">Suiza</option>
                        <option value="SR">Surinam</option>
                        <option value="TH">Tailandia</option>
                        <option value="TW">Taiwán</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TJ">Tayikistán</option>
                        <option value="TF">Territorios franceses del Sur</option>
                        <option value="TP">Timor Oriental</option>
                        <option value="TG">Togo</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad y Tobago</option>
                        <option value="TN">Túnez</option>
                        <option value="TM">Turkmenistán</option>
                        <option value="TR">Turquía</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UA">Ucrania</option>
                        <option value="UG">Uganda</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistán</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="YE">Yemen</option>
                        <option value="YU">Yugoslavia</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabue</option>
                    </select></div>
                <div class="form-group"><label for="5">Sinopsis</label><textarea class="form-control" name="sinopsis" required id="5" placeholder="Escribe la sinopsis" maxlength="3000" cols="30" rows="10"></textarea></div>
                <div class="form-group"><label for="14">Reparto</label><textarea class="form-control" name="reparto" required id="14" placeholder="Escribe el reparto" maxlength="3000" cols="30" rows="10"></textarea></div>
             <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Tipo de Obra</legend>
                    <label for="16">Estreno/Película</label>            <input type="radio" class="radio-inline" id="16" checked name="obra" value="estreno"><br>
                    <label for="17">Película</label>           <input type="radio" class="radio-inline" id="17" name="obra" value="pelicula"><br>
                    <label for="18">Serie</label>          <input type="radio" class="radio-inline" id="18" name="obra" value="serie"><br>
                    <label for="19">Documental</label>          <input type="radio" class="radio-inline" id="19" name="obra" value="docu"><br>
             </fieldset>
                <br><br>
                    <div style="position:absolute;left: 35%;bottom:3%"><button class="btn btn-primary">Enviar</button>
                            <a href="Admin.html" class="btn btn-primary">Volver a Login</a></div>

            </fieldset>
                <br>
            </div>
        </form>


        <?php

}

//If the quiet thing is director
elseif ($menu == 'director') {

        ?>

        <h2 style="text-align: center;color: white" class="modal-title">Formulario Alta de Nuevo Director</h2><br><br><br>

        <form action="alta_director.php" role="form" style="position:static;top: 10%;">
                <div id="obra">
                        <fieldset class="scheduler-border" style="background-color:darkgrey">
                                <legend class="scheduler-border">Completa todos los campos de alta del nuevo Director</legend><br>
                                <div class="form-group" ><label for="1">Nombre Artístico</label><input class="form-control" style="margin-left: 0.5%" type="text" required max="50" id="1" name="nombre"></div>
                                <div class="form-group"><label for="2">Nacionalidad</label><input class="form-control" style="margin-left: 0.5%" type="text" required min="19" max="230" id="2" name="nacionalidad"></div>
                                <div class="form-group"><label for="4">Fecha de Nacimiento</label><input class="form-control" style="margin-left: 0.5%" required type="date" id="4" name="fecha"></div>
                                <br><br>
                                <div style="position:absolute;left: 32%;bottom:16%"><button class="btn btn-primary">Enviar</button>
                                        <a href="Admin.html" class="btn btn-primary">Volver a Login</a></div>

                        </fieldset>
                        <br>
                </div>
        </form>

<?php

}


//i make new functions...

else


?>


</body>
</html>
