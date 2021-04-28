<?php
// Este programa saluda a un alumno a partir del nombre ingresado
// string $nombreAlumno

// Ingreso y lectura del nombre
echo "Ingrese el nombre del alumno: ";
$nombreAlumno = trim(fgets(STDIN));

// Devuelvo el saludo
echo "Bienvenido/a a la programación ".$nombreAlumno;
?>