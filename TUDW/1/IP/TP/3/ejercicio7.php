<?php
// Determinar si una persona es mayor de edad
// boolean esMayor
// int edad
// string nombre, mensaje

// Lectura de variables
echo "Ingrese su nombre: ";
$nombre = trim(fgets(STDIN));
echo "Ingrese su edad: ";
$edad = trim(fgets(STDIN));

// Calculos
$esMayor = $edad >= 18;
$mensaje = $esMayor ? $nombre. " es mayor de edad" : " es menor de edad";
echo $mensaje;

?>