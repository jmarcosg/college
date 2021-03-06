<?php
/**
 * Este modulo recibe por parametro un numero para encriptar y lo retorna encriptado
 * 
 * @param $numero
 * @return $encriptado
 */
function encriptar($numero) {
    $num1 = ((int)($numero / 1000) + 7) % 10; //PRIMER DIGITO
    $num2 = ((int)(($numero % 1000) / 100) + 7) % 10; //SEGUNDO DIGITO
    $num3 = ((int)(($numero % 100) / 10) + 7) % 10; //TERCER DIGITO
    $num4 = (($numero % 10) + 7) % 10; //CUARTO DIGITO

    $encriptado = ($num3 * 1000) + ($num4 * 100) + ($num1 * 10) + $num2;
    return $encriptado;
}

/**
 * Este modulo recibe por parametro un numero para desencriptar y lo retorna desencriptado
 * 
 * @param $numEncriptado
 * @return $desencriptado
 */
function desencriptar($numEncriptado) {
    $num1 = ((int)($numEncriptado / 1000) + 3) % 10; //PRIMER DIGITO
    $num2 = ((int)(($numEncriptado % 1000) / 100) + 3) % 10; //SEGUNDO DIGITO
    $num3 = ((int)(($numEncriptado % 100) / 10) + 3) % 10; //TERCER DIGITO
    $num4 = (($numEncriptado % 10) + 3) % 10; //CUARTO DIGITO

    $desencriptado = ($num3 * 1000) + ($num4 * 100) + ($num1 * 10) + $num2;
    return $desencriptado;
}

/*Este programa imprime el valor de un numero que encripta y luego lo muestra desencriptado de nuevo*/
//int $num, $encriptado, $desencriptado

// Ingreso y lectura de variables
echo "Ingrese un numero a encriptar: ";
$num = trim(fgets(STDIN));

// Invoco a la funcion para encriptar el numero ingresado y lo almaceno en un variable
$encriptado = encriptar($num);
echo "El numero " , $num , " encriptado es: " , $encriptado , "\n";

// Invoco a la funcion para desencriptar el numero encriptado y lo almaceno en un variable
$desencriptado = desencriptar($encriptado);
echo "El numero encriptado " , $encriptado , " es: " , $desencriptado;
?>