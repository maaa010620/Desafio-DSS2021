<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/forms.css" />
    <link rel="stylesheet" href="css/tabla.css" />
    <title>esfera</title>
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
        <h1>¿DESEAS SABER EL AREA DE UNA ESFERA?, ¡AVERIGUEMOSLO!</h1>
    </header>

    <section>
        <article>
            <br><br><br><br>
            <form action="esfera.php" method="POST">

                <label>Ingresa el diametro en (m):</label>
                <input type="text" id="numero" name="diametro" required />
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
                            <th scope="col">Area de Esfera Obtenida:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            
                            if(isset($_POST['submit']) && $_POST['submit'] == "Obtener"):
                                
                                
                                //obtenemos el dato que nos servira para calcular el area de la esfera
                                extract($_POST);    
                                $numeroDiametro = !empty($diametro) ? $diametro : "<a href=\"index.html\">No ingresó el numero</a>";
                                
                                //nos aseguramos que el dato que se esta ingresando sea un numero
                                if($numeroDiametro > 0):

                                    //convertimos los milimetros a metros para comoda manipulacion de datos
                                    define("mm", "1000.0");//constante de conversion de milimetros(mm) a metros
                                    $numeroEnMetros = $numeroDiametro/mm;

                                    //definimos los datos constantes que usaremos al procesar los datos para obtener el area
                                
                                    define("pi", "3.1415");//constante pi
                                    define("exp", "2");//constante exponencial
                                    define("constante", "4");//se multiplica por 4
                                    define("divisor", "2"); //su respectivo divisor

                                    $obtenemosDiametro = ($numeroEnMetros/divisor);
                                    $numeroElevado = pow ( $obtenemosDiametro , exp );
                                    $resultadoAreaEsfera = constante * pi *  $numeroElevado;

                                    //imprimimos por pantalla el resultado del area obtenida
                                    echo "\t\t<td>\n".$resultadoAreaEsfera."\n</td>\n";
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