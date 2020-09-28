<?php
/**
 * Esta funcion verifica si los valores ingresados son correctos
 * Los valores son correctos si: 0 >= horas <= 12, 0 >= minutos <= 59, 0 >= segundos <= 59
 * @param int $h
 * @param int $m
 * @param int $s 
 * @return boolean $sonCorrectos
 */
function verificarValores ($h, $m, $s) {
    if ($h >= 0 && $h <= 12) {
        if ($m >= 0 && $m <=59) {
            if ($s >= 0 && $s <= 59) {
                $sonCorrectos = true;
            } else {
                $sonCorrectos = false;
            }
        } else {
            $sonCorrectos = false;
        }
    } else {
        $sonCorrectos = false;
    }
    return $sonCorrectos;
}

/**
 * Esta funcion verifica dos cantidades de segundos que recibe por parametro para ver cual es menor
 * @param int $segs1
 * @param int $segs2
 * @return boolean esMenor
 */
function esMenor ($segs1, $segs2) {
    if ($segs1 < $segs2) {
        $esMenor = true;
    } else {
        $esMenor = false;
    }
    return $esMenor;
}

/**
 * Esta funcion convierte una cantidad de horas, minutos y segundos a un total de segundos
 * Este total se lo calcula tal que, horas * 3600 + minutos * 60 + segundos
 * @param int $hora
 * @param int $min
 * @param int $seg
 * @param string $tipoH
 * @return int $segTotales
 */
function aSegundos ($hora, $min, $seg, $tipoH) {
    // Verifico el tipo de horario para ver si es necesario convertir la hora
    if ($tipoH == "PM") {
        if ($hora == 1) {
            $hora = 13;
        } elseif ($hora == 2) {
            $hora = 14;
        } elseif ($hora == 3) {
            $hora = 15;
        } elseif ($hora == 4) {
            $hora = 16;
        } elseif ($hora == 5) {
            $hora = 17;
        } elseif ($hora == 6) {
            $hora = 18;
        } elseif ($hora == 7) {
            $hora = 19;
        } elseif ($hora == 8) {
            $hora = 20;
        } elseif ($hora == 9) {
            $hora = 21;
        } elseif ($hora == 10) {
            $hora = 22;
        } elseif ($hora == 11) {
            $hora = 23;
        } elseif ($hora == 12) {
            $hora = 24;
        } else {
            echo "ERROR: Hora incorrecta!";
        }
    } else {
        echo "Horas verificadas. No hace falta convertir."."\n";
    }

    $segTotales = ($hora * 3600) + ($min * 60) + $seg;
    return $segTotales;
}

/**
 * Esta funcion calcula la diferencia horaria entre las horas ingresadas basado en la cantidad que representan en segundos
 * @param int $segs1
 * @param int $segs2
 */
function difHoras($segs1, $segs2) {
    // int $horas, $minutos, $segundos, $resto
    // float $cociente
    // Verifico cual de las dos horas en segundos es mayor para asi poder calcular la diferencia entre ambas
    if ($segs1 > $segs2) {
        $diferencia = $segs1 - $segs2; 
    } else {
        $diferencia = $segs2 - $segs1;
    }
    // Calculo y convierto los segundos totales a formato hh:mm:ss
    $cociente = (int)$diferencia / 60;
    $resto = $diferencia % 60; // Segundos
    $segundos = $resto;

    if ($cociente >= 60) {
        $horas = (int)$cociente / 60;
        $minutos = $cociente % 60;
    } else {
        $horas = (int)$cociente;
        $minutos = $cociente % 60;
    }
    
    echo "La diferencia es: ".(int)$horas."h:".$minutos."m:".$segundos."s"."\n";
}

/**
 * Esta funcion convierte una cantidad de segundos a horas, minutos y segundos
 * @param int $segsTotales
 */
function formatoHora ($segsTotales) {
    // int $horas, $minutos, $segundos, $resto
    // float $cociente
    // Calculo y convierto los segundos totales a formato hh:mm:ss
    $cociente = (int)$segsTotales / 60;
    $resto = $segsTotales % 60; // Segundos
    $segundos = $resto;

    if ($cociente >= 60) {
        $horas = (int)$cociente / 60;
        $minutos = $cociente % 60;
    } else {
        $horas = (int)$cociente;
        $minutos = $cociente % 60;
    }

    echo (int)$horas."h:".$minutos."m:".$segundos."s son ".$segsTotales. " seg."."\n";
}

/**
 * Este programa lee dos horas, minutos, segundos y tipo de horario diferentes
 * Luego las ordena de mayor a menor, muestra la cantidad de segundo que representan y la diferencia horaria
 * int $hora1, $hora2, $min1, $min2, $seg1, $seg2, $cantS1, $cantS2, $difHoraria
 * string $tipoH1, $tipoH2
 * boolean $valoresCorrectos1, $valoresCorrectos2, $hora1Menor
*/

// Ingreso y lectura de valores
echo "Ingrese una cantidad de horas (0 a 12): ";
$hora1 = (int)trim(fgets(STDIN));
echo "Ingrese una cantidad de minutos (0 a 59): ";
$min1 = (int)trim(fgets(STDIN));
echo "Ingrese una cantidad de segundos (0 a 59): ";
$seg1 = (int)trim(fgets(STDIN));
echo "Ingrese un tipo (AM/PM): ";
$tipoH1 = trim(fgets(STDIN));
// Segundo ingreso y lectura de valores
echo "Ingrese otra cantidad de horas (0 a 12): ";
$hora2 = (int)trim(fgets(STDIN));
echo "Ingrese otra cantidad de minutos (0 a 59): ";
$min2 = (int)trim(fgets(STDIN));
echo "Ingrese otra cantidad de segundos (0 a 59): ";
$seg2 = (int)trim(fgets(STDIN));
echo "Ingrese un tipo (AM/PM): ";
$tipoH2 = trim(fgets(STDIN));

// Invoco a la funcion para verficar si los valores ingresados son correctos
$valoresCorrectos1 = verificarValores($hora1, $min1, $seg1);
$valoresCorrectos2 = verificarValores($hora2, $min2, $seg2);

// Si los valores ingresados son correctos el programa continua, de lo contrario se corta
if ($valoresCorrectos1 == true && $valoresCorrectos2 == true) {
    // Convierto las horas, minutos y segundos ingresados a un total de segundos
    $cantS1 = aSegundos($hora1, $min1, $seg1, $tipoH1);
    $cantS2 = aSegundos($hora2, $min2, $seg2, $tipoH2);

    // Invoco a la funcion para verficar cual de las dos cantidades de segundos es menor
    $hora1Menor = esMenor($cantS1, $cantS2);

    // Verifico cual de las dos horas es mayor segun la cantidad de segundos
    if ($hora1Menor) {
        echo "Las horas ordenadas de mayor a menor son: "."\n";
        formatoHora($cantS2);
        formatoHora($cantS1);
    } else {
        formatoHora($cantS1);
        formatoHora($cantS2);
    }

    // Invoco a la funcion para calcular la diferencia de tiempo entre las horas ingresadas 
    difHoras($cantS1, $cantS2);
} else {
    echo "ERROR: Valores incorrectos!";
}

 ?>