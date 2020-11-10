<?php

/**
 * PROGRAMA PRINCIPAL
 * Este programa contiene dos arreglos predefinidos, uno de celulares y otro de los precios de los mismos. Luego en un menu de opciones, se muesrtan las tres funciones que se pueden realizar
 * array String $celulares
 * array float $valores
 * int $numeroCelular
 * float $sumaCelulares
 */

// Predefino los arreglos
$celulares = ["Moto G6", "Samsung J7", "LG K9", "iPhone SE", "Galaxy A9"];
$valores = [22030.90, 10500.00, 27999.00, 38105.00, 17000.80];

// Inicializo variables
$sumaCelulares = 0;

// Ingreso y lectura de valores
echo "Ingrese el numero del celular que desee mostrar: ";
$numeroCelular = (int) trim(fgets(STDIN));

// Muestro el celular y valor elegido dentro del arreglo
echo "El celular elegido fue " . $celulares[$numeroCelular] . " y su costo es $" . $valores[$numeroCelular];
