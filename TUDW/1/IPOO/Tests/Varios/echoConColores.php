<?php
/**
 * Codigos de letras y su color correspondiente
 * 0;30     Negro
 * 1;30     Gris
 * 0;31     Rojo
 * 1;31     Rojo claro
 * 0;32     Verde
 * 1;32     Verde claro
 * 0;33     Cafe
 * 1;33     Amarillo
 * 0;34     Azul
 * 1;34     Celeste
 * 0;35     Magenta
 * 1;35     Magenta claro
 * 0;36     Cyan
 * 1;36     Cyan claro
 * 0;37     Gris claro
 * 1;37     Blanco
 */

/**
 * Codigos de fondos y su color colorrespondiente
 * 40      Negro
 * 41      Rojo
 * 42      Verde
 * 43      Amarillo
 * 44      Azul
 * 45      Magenta
 * 46      Cyan
 * 47      Gris claro
 */

/**
 * Sintaxis
 * \e[codigoColorLetra;codigoColorFondom'mensajeEnPantalla'\e[0m
 */
echo "Fondo rojo, letras blancas\n";
print("\e[1;37;41mError: No hay conexion a la base de datos\e[0m\n");
echo "Fondo verde, letras blancas\n";
print("\e[1;37;42mError: No hay conexion a la base de datos\e[0m\n");
echo "\e[1;37;45mTest\e[0m\n";
