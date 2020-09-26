<?php
/**
 * Esta funcion verifica si una persona esta apta para seleccionada en una empresa
 * Para estar apta debe:
 * Ser sexo maculino, ser menor de 40 años y tener el secundario completo
 * O, ser sexo femenino, tener entre 25 y 30 años con secundario completo
 * @param string $sexo
 * @param int $edad
 * @param string $secuCompleto
 * @return boolean $apta
 */
function seleccionPersonal ($sexo, $edad, $secuCompleto) {
    if ($sexo == "m" && $edad < 40 && $secuCompleto == "si") {
        $apta = true;
    } elseif ($sexo == "f" && $edad >= 25 && $edad <= 30 && $secuCompleto == "si") {
        $apta = true;
    } else {
        $apta = false;
    }
    return $apta;
}

// Este programa lee el sexo, edad y si tiene el secundario completo de una persona, luego muestra si esta en condiciones de ser seleccionada\
// int $edadPersona
// string $sexoPersona, $secundarioCompleto
// boolean $seleccionable

// Ingreso y lectura de valores
echo "Ingrese el sexo de la persona (m/f): ";
$sexoPersona = trim(fgets(STDIN));
echo "Ingrese la edad de la persona: ";
$edadPersona = (int)trim(fgets(STDIN));
echo "Tiene el secundario completo? (si/no): ";
$secundarioCompleto = trim(fgets(STDIN));

// Invoco a la funcion para la seleccion de personal y almaceno su valor
$seleccionable = seleccionPersonal($sexoPersona, $edadPersona, $secundarioCompleto);

// Si la persona es seleccionable retorna verdadero, de lo contrario falso
if ($seleccionable == true) {
    echo "Seleccionado";
} else {
    echo "No cumple los requisitos";
}
?>