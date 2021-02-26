<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/forms.css" />
    <link rel="stylesheet" href="css/tabla.css" />
    <title>cubo</title>
</head>

<body>
    <div id="header">
        <ul class="nav">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="">Servicios</a>
                <ul>
                    <li><a href=esfera.php>Esfera.</a></li>
                    <li><a href="cubo.php">Cubo.</a></li>
                    <li><a href="cilindro.php">Cilindro.</a></li>
                    <li><a href="javascript:cerrar();">Salir.</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <header>
        <br><br><br><br><br>
        <h1>¿DESEAS SABER EL AREA DE UN CUBO?, ¡AVERIGUEMOSLO!</h1>
    </header>

    <section>
        <article>
            <br><br><br><br>
            <form action="cubo.php" method="POST">

                <label>Ingresa el tamño de la arista en (mm):</label>
                <input type="text" id="numero" name="arista" required />
                <input type="submit" id="enviar" name="submit" value="Obtener" class="submit" />
            </form>
        </article>
    </section>

    <section>
        <article>
            <div id="info">
                <table id="hor-zebra" summary="Datos a convertir">
                    <thead>
                        <tr class="thead">
                            <th scope="col">Area de Cubo Obtenida:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if(isset($_POST['submit']) && $_POST['submit'] == "Obtener"):
                                    
                                //extraemos los datos del formulario que necesitaremos para procesarlos
                                extract($_POST);    
                                $numeroArista = !empty($arista) ? $arista : "<a href=\"index.html\">No ingresó el numero</a>";
                            
                                //nos aseguramos que el dato que se esta ingresando sea un numero
                                if($numeroArista > 0):

                                    //convertimos los milimetros a metros para comoda manipulacion de datos
                                    define("mm", "1000.0");//constante de conversion de milimetros(mm) a metros
                                    $numeroEnMetros = $numeroArista/mm;
                                    //definimos y asignamos los valores que nos ayudaran para realizar los procesos
                                    define("constante", "6");//se multiplica por 6 la cantidad de lados del cubo
                                    define("exp", "2"); //necesitamos un constante para definir el exponente de la arista

                                    //pow es una pequeña funciona q nos ayudara a obtener el exponente de un numero de forma mas precisa
                                    $numeroElevado = pow ( $numeroEnMetros , exp );

                                    //con todos los resultados realizamos la operacion final
                                    $resultadoAreaCubo = constante * $numeroElevado;

                                    //imprimimos por pantalla el resultado del area obtenida
                                    echo "\t\t<td>\n".$resultadoAreaCubo."\n</td>\n";
                                
                                else:
                                    echo "\t<tr class=\"odd\">\n";
                                    echo "\t\t<td>No ingresaste un numero entero, decimal o positivo.</td>";
                                    echo "\t</tr>\n";
                                endif;

                            endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</body>

 <!-- utilizamos nuevamente javascript en las paginas del mini sistema para poder cerrarlo,
    en cuanto el usuario desee salir de el-->
<script language="javascript" type="text/javascript"> 
        function cerrar() { 
            window.open('','_parent',''); 
            window.close(); 
        } 
</script>
</html>