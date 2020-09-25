<?php
/**
 * Esta funcion muestra si un alumno aprobo o desaprobo
 * @param int $nota;
 */
function aproboDesaprobo ($nota) {
    if ($nota >= 0 and $nota <= 10) {
        if ($nota >= 4) {
            echo "Aprobó";
        } else {
            echo "Desaprobó";
        }
    } else {
        echo "Nota invalida"; 
    }
}

// Este programa lee una nota y luego muestra si el alumno aprobo o desaprobo
// int $nota

// Ingreso y lectura de valores
echo "Ingrese una nota: ";
$nota = (int)trim(fgets(STDIN));

// Invoco a la funcion para mostrar la condicion de nota del alumno
aproboDesaprobo($nota);
?>