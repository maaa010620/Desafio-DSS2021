<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/forms.css" />
    <link rel="stylesheet" href="css/tabla.css" />
    <title>cilindro</title>
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
        <h1>¿DESEAS SABER EL AREA DE UN CILINDRO?, ¡AVERIGUEMOSLO!</h1>
    </header>

    <section>
        <article>
            <br><br><br><br>
            <form action="cilindro.php" method="POST">

                <label>Ingresa el tamaño de el radio en (mm):</label>
                <input type="text" id="numero" name="radio" required />
                <br><br>
                <label>Ingresa el tamaño de la altura en (mm):</label>
                <input type="text" id="numero" name="altura" required />
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
                            <th scope="col">Area de Cilindro Obtenida:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if(isset($_POST['submit']) && $_POST['submit'] == "Obtener"):
                                   
                                //extraemos los datos radio y altura del formulario para obtener el area del cilindro
                                extract($_POST);    
                                $numeroRadio = !empty($radio) ? $radio : "<a href=\"index.html\">No ingresó el numero</a>";
                                $numeroAltura = !empty($altura) ? $altura : "<a href=\"index.html\">No ingresó el numero</a>";
                            
                                //nos aseguramos que el dato que se esta ingresando sea un numero
                                if($numeroRadio > 0 && $numeroAltura>0):

                                    //convertimos los milimetros a metros para comoda manipulacion de datos
                                    define("mm", "1000.0");//constante de conversion de milimetros(mm) a metros
                                    $numeroRadioEnMetros = $numeroRadio/mm;
                                    $numeroAlturaEnMetros = $numeroAltura/mm;

                                    //establecemos las variables que nos ayduaran para realziar las operaciones
                                    define("constante", "2");//se multplica por 2
                                    define("pi", "3.1415");// definimos pi
                                    define("exp", "2");//siempre necesitamos el exponencial 2

                                    //con la funciona especial pow obtenemos el radio al cuadrado
                                    $radioAlCuadrado = pow ( $numeroRadioEnMetros , exp );
                                    
                                    //procesamos todos los datos necesarios para obtener finalmente el resultado
                                    $resultadoAreaCubo = (constante * pi * $numeroRadioEnMetros * $numeroAlturaEnMetros) + (constante * pi *$radioAlCuadrado);

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
    <br><br>
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