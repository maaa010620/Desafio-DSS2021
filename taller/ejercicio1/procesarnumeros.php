<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-
scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <title>Numeros recibidos</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nobile" />
    <link rel="stylesheet" href="css/tabla.css" />

</head>

<body>
    <section>
        <article>
            <div id="info">
                <table id="hor-zebra" summary="Datos a convertir">
                    <thead>
                        <tr class="thead">
                            <th scope="col">Porcentaje de valores pares ingresados:</th>
                            <th scope="col">Valores positivos, formato Descendente:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if(isset($_POST['submit']) && $_POST['submit'] == "Comprobar"):
                                
                                //definimos todas las variables con las respectivas asignaciones que usaremos en
                                $contadorPares=0;
                                $constanteNumeros = 12;
                                $constantePorcentaje = 100;
                                //definimos los arreglos que necesitaremos 
                                $numerosPositivos=array();
                                $numerosIngresados=array();
                                
                                //extraemos los 12 numeros del formulario y al ser un numero por campo con 
                                //nombre identificatorio diferente ingresamos los 12 espacios de datos del arreglo manualmente
                                extract($_POST);    
                                $numerosIngresados[0] = !empty($numero1) ? $numero1 : "<a href=\"ingresonumeros.html\">No ingresó el numero 1</a>";
                                $numerosIngresados[1] = !empty($numero2) ? $numero2 : "<a href=\"ingresonumeros.html\">No ingresó el numero 2</a>";
                                $numerosIngresados[2] = !empty($numero3) ? $numero3 : "<a href=\"ingresonumeros.html\">No ingresó el numero 3</a>";
                                $numerosIngresados[3] = !empty($numero4) ? $numero4 : "<a href=\"ingresonumeros.html\">No ingresó el numero 4</a>";
                                $numerosIngresados[4] = !empty($numero5) ? $numero5 : "<a href=\"ingresonumeros.html\">No ingresó el numero 5</a>";
                                $numerosIngresados[5] = !empty($numero6) ? $numero6 : "<a href=\"ingresonumeros.html\">No ingresó el numero 6</a>";
                                $numerosIngresados[6] = !empty($numero7) ? $numero7 : "<a href=\"ingresonumeros.html\">No ingresó el numero 7</a>";
                                $numerosIngresados[7] = !empty($numero8) ? $numero8 : "<a href=\"ingresonumeros.html\">No ingresó el numero 8</a>";
                                $numerosIngresados[8] = !empty($numero9) ? $numero9 : "<a href=\"ingresonumeros.html\">No ingresó el numero 9</a>";
                                $numerosIngresados[9] = !empty($numero10) ? $numero10 : "<a href=\"ingresonumeros.html\">No ingresó el numero 10</a>";
                                $numerosIngresados[10] = !empty($numero11) ? $numero11 : "<a href=\"ingresonumeros.html\">No ingresó el numero 11</a>";
                                $numerosIngresados[11] = !empty($numero12) ? $numero12 : "<a href=\"ingresonumeros.html\">No ingresó el numero 12</a>";                              
                                
                                //primer foreach para obtener los datos de nuestro interes segun lo pedido en el ejercicio
                                foreach ($numerosIngresados as $clave => $valor) 
                                {   
                                    //obtenemos los postivos                                 
                                    if($valor>0):
                                        //guardamos todos los numeros postivos que encontramos en un nuevo arreglo
                                        $numerosPositivos[]=$valor;
                                    endif;

                                    //obtenemos los numeros q sin importar su signo sean un numero par
                                    if(($valor<0 || $valor>0) && $valor%2==0):
                                        $contadorPares++;                                       
                                    endif;
                                }

                                //procesamos los numeros pares que encontramos en los numeros que ingreso el usuario
                                $resultadoPorcentaje = ($contadorPares * $constanteNumeros)/$constantePorcentaje;

                                //imprimimos por pantalla el porcentaje de numeros pares
                                //primero verificamos si hubieron datos para mostrar un porcentaje
                                //sino se le indicara al usuario
                                if($resultadoPorcentaje != 0):
                                    echo "\t\t<td>\n"."%".$resultadoPorcentaje."\n</td>\n";
                                else:
                                    echo "\t\t<td>\n"."Lo sentimos, No hay ningun numero par"."\n</td>\n";
                                endif;
                                

                                //gracias al nuevo arreglo con solo numeros positivos, simplemente usamos la funcion especial
                                //de php (arsort) para ordenarlos de forma descendente
                                arsort($numerosPositivos);

                                //extraemos los nuemeros positivos ya ordenados de forma descendente con un nuevo foreach
                                echo "\t\t<td>\n";
                                
                                //verificamos que el array que tendria los numeros positivos no este vacio
                                //si esta vacio se le indica al usuario sino se imprimen los numeros positivos
                                if(empty($numerosPositivos)):
                                    echo 'Lo sentimos, No hay ningun numero positivo que mostrar';                                    
                                else:
                                    foreach ($numerosPositivos as $clave => $positivo) 
                                    { 
                                        //se imprime numero a numero
                                        echo $positivo.', ';                 
                                    }
                                endif;
                                
                                echo "\n</td>\n";
                                                               
                            else:
                                echo "\t<tr class=\"odd\">\n";
                                echo "\t\t<td>No se han ingresado desde el formulario.</td>";
                                echo "\t</tr>\n";
                            endif;
                        ?>
                    </tbody>
                </table>
                <div id="link">
                    <a href="ingresonumeros.html" class="button-link">Ingresar nuevos numeros</a>
                </div>
            </div>
        </article>
    </section>
</body>

</html>