<?php
include_once 'Partido.php';
include_once 'Equipo.php';
include_once 'Categoria.php';
include_once 'MinisterioDeporte.php';
include_once 'Torneo.php';
include_once 'Provincial.php';
include_once 'Nacional.php';

// Creo equipos
$objE1 = new Equipo("Equipo 1", "Cap E1", "11", "Menores");
$objE2 = new Equipo("Equipo 2", "Cap E2", "11", "Menores");
$objE3 = new Equipo("Equipo 3", "Cap E3", "11", "Juveniles");
$objE4 = new Equipo("Equipo 4", "Cap E4", "11", "Juveniles");
$objE5 = new Equipo("Equipo 5", "Cap E5", "11", "Mayores");
$objE6 = new Equipo("Equipo 6", "Cap E6", "11", "Mayores");
$objE7 = new Equipo("Equipo 7", "Cap E7", "11", "Juveniles");
$objE8 = new Equipo("Equipo 8", "Cap E8", "11", "Juveniles");
$objE9 = new Equipo("Equipo 9", "Cap E9", "11", "Mayores");
$objE10 = new Equipo("Equipo 10", "Cap E10", "11", "Mayores");
$objE11 = new Equipo("Equipo 11", "Cap E11", "11", "Mayores");
$objE12 = new Equipo("Equipo 12", "Cap E12", "11", "Mayores");

// Creo partidos
$objPart1 = new Partido($objE7, $objE8, 80, 120);
$objPart2 = new Partido($objE9, $objE10, 81, 110);
$objPart3 = new Partido($objE11, $objE12, 115, 85);
$objPart4 = new Partido($objE1, $objE2, 3, 2);
$objPart5 = new Partido($objE3, $objE4, 0, 1);
$objPart6 = new Partido($objE5, $objE6, 2, 3);

// Creo colecciones de partidos
$coleccionPartidos_p2 = [$objPart1, $objPart1, $objPart1];
$coleccionPartidos_p3 = [$objPart4, $objPart5, $objPart6];

// Creo la instancia de la clase Ministerio deporte
$objMinDep = new MinisterioDeporte(2019, $coleccionPartidosProvinciales);

echo "Inciso 5 \n";
$ArrayAsociativo = [];
$objMinDep = $objMinDep->registrarTorneo(coleccionPartidos_p2, 'provincial', $ArrayAsociativo);
echo $objMinDep . "\n";

echo "Inciso 6 \n";
$ArrayAsociativo = [];
$objMinDep = $objMinDep->registrarTorneo(coleccionPartidos_p3, 'nacional', $ArrayAsociativo);
echo $objMinDep . "\n";

echo "Inciso 7 \n";
$torneo = new Torneo($coleccionPartidos_p2, 10000);
$objMinDep = otorgarPremioTorneo($idTorneo_5);
echo $objMinDep . "\n";

echo "Inciso 8 \n";
$torneo = new Torneo($coleccionPartidos_p2, 10000);
$objMinDep = otorgarPremioTorneo($idTorneo_6);
echo $objMinDep . "\n";

echo "Inciso 9 \n";
echo $objMinDep . "\n";
