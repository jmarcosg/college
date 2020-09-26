<?php
/**
 * Esta funcion imprime en pantalla un cartel representando los caños de un arco en una cancha
 * No recibe nada por parametros ni retorna ningun valor
 */
function dibujarCanios () {
    echo " +----+              |               +----+"."\n";
}

/**
 * Esta funcion imprime en pantalla un cartel representando el campo en una cancha
 * No recibe nada por parametros ni retorna ningun valor
 */
function dibujarCampo () {
    echo " |                   |                    |"."\n";
}

/**
 * Esta funcion imprime en pantalla un cartel representando las lineas medias en una cancha
 * No recibe nada por parametros ni retorna ningun valor
 */
function dibujarLineaMedia () {
    echo " |    |              |               |    |"."\n";
}

/**
 * Esta funcion imprime en pantalla un cartel representando una linea de banda en una cancha
 * No recibe nada por parametros ni retorna ningun valor
 */
function dibujarLineaDeBanda () {
    echo " +-------------------+--------------------+"."\n";
}

// Este programa dibuja una cancha

// Imprimo por pantalla el dibujo haciendo uso solamente de las funciones
dibujarLineaDeBanda();
dibujarCampo();
dibujarCampo();
dibujarCanios();
dibujarLineaMedia();
dibujarLineaMedia();
dibujarCanios();
dibujarCampo();
dibujarCampo();
dibujarLineaDeBanda();
?>