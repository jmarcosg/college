<?php
/**
 * Esta funcion recibe un numero entero y muestra los numeros pares anteriores al mismo
 * @param int $num
 */
function mostrarNaturalesPares ($num){
    // int $i, $calcularPar

    if ($num >= 0) {
        echo "Numeros pares anteriores a ".$num.": ";
        for ($i = 0; $i <= $num; $i++) {
            $calcularPar = $i % 2;
            if ($calcularPar == 0) {
                echo $i." ";
            }
        }
    } else {
        echo "El numero debe ser un Natural (desde 0 a +infinito)";
    }
}

/**
 * Programa principal donde se lee un numero y luego a traves de una funcion se muestran por pantalla los numeros pares anteriores al mismo
 * int $numero
 */
echo "Ingrese un numero: ";
$numero = trim(fgets(STDIN));

// Invoco a la funcion para mostrar los naturales pares
mostrarNaturalesPares($numero);
?>