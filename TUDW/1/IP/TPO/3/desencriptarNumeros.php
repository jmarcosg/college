<?php
//PROGRAMA desencriptar
/*Este algoritmo recibe un numero de cuatro digitos encriptado
en el ejercicio 10) a) y lo desencripta*/
//int aux, desencriptado, desencriptadoAux, aux1, aux2, num
//boolean esMenorCero, esCero
echo "Ingrese un numero para desencriptar: ";
$num = trim(fgets(STDIN));

$desencriptadoAux = 0;
$desencriptado = 0;

//Cambiar los digitos de lugar
$aux = (int)($num / 1000); //PRIMER DIGITO
$aux2 = (int)(($num % 100) / 10); //TERCER DIGITO
$desencriptadoAux += ($aux * 10);
$desencriptadoAux += ($aux2 * 1000);
$aux = $num % 10; //CUARTO DIGITO
$aux2 = (int)(($num % 1000) / 100); //SEGUNDO DIGITO
$desencriptadoAux += ($aux * 100);
$desencriptadoAux += $aux2;

//Calcular los valores anteriores a la encriptacion
//CUARTO DIGITO
$aux = ($desencriptadoAux % 10) - 7;
$esMenorCero = $aux < 0;
$esMenorCero ? $aux = (10 + $aux) : $aux;
$esCero = $aux == 0;
$esCero ? $desencriptado = "0".$desencriptado : $desencriptado += $aux;

//TERCER DIGITO
$aux = (int)(($desencriptadoAux % 100) / 10) - 7;
$esMenorCero = $aux < 0;
$esMenorCero ? $aux = (10 + $aux) : $aux;
$esCero = $aux == 0;
$esCero ? $desencriptado = "0" . $desencriptado : $desencriptado += $aux * 10;

//SEGUNDO DIGITO
$aux = (int)(($desencriptadoAux % 1000) / 100) - 7;
$esMenorCero = $aux < 0;
$esMenorCero ? $aux = (10 + $aux) : $aux;
$esCero = $aux == 0;
$esCero ? $desencriptado = "0" . $desencriptado : $desencriptado += $aux * 100;

//PRIMER DIGITO
$aux = (int)($desencriptadoAux / 1000) - 7;
$esMenorCero = $aux < 0;
$esMenorCero ? $aux = (10 + $aux) : $aux;
$esCero = $aux == 0;
$esCero ? $desencriptado = "0" . $desencriptado : $desencriptado += $aux * 1000;

echo "El numero " . $num . " desencriptado es: " . $desencriptado;
?>