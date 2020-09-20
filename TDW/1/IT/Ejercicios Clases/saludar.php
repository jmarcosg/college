<?php
/**
 * Imprime por pantalla un saludo, dirigiendose a la persona que se indica por parametro
 * @param string $nombre
 */

 function darBienvenida ($nombre) {
     echo "Bievenido/a ".$nombre. "!!";
 }

 // string $nombre
 echo "Ingrese un nombre: ";
 $nombre = trim(fgets(STDIN));
 darBienvenida($nombre);
?>