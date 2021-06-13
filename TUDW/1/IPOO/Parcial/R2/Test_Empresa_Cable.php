<?php
include_once 'Cliente.php';
include_once 'Plan.php';
include_once 'Canal.php';
include_once 'Contrato.php';
include_once 'Web.php';
include_once 'Oficina.php';
include_once 'EmpresaCable.php';

// Creo EmpresaCable
$empresaCable = new EmpresaCable([], []);

// Creo Canales
$canal1 = new Canal("Musical", 550, true);
$canal2 = new Canal("Educativo", 850, true);
$canal3 = new Canal("Infantil", 650, false);

$colCanales1 = [$canal1, $canal2, $canal3];
$colCanales2 = [$canal1, $canal2];

// Creo Planes
$plan1 = new Plan(111, $colCanales1, 3000);
$plan2 = new Plan(101, $colCanales2, 2000);

// Creo Cliente
$cliente = new Cliente("DNI", 32352327, "Pepito", "Perez", 68330650);

// Creo Fechas
$fechaHoy = date('Y-m-d');
$fechaVencimiento1 = date('Y-m-d', strtotime($fechaHoy . "+ 1 month"));

// Creo Contratos
$contrato1 = new Oficina($fechaHoy, $fechaVencimiento1, $plan1, "Al dia", 0, true, $cliente);
$contrato2 = new Web($fechaHoy, $fechaVencimiento1, $plan1, "Al dia", 0, true, $cliente);
$contrato3 = new Web($fechaHoy, $fechaVencimiento1, $plan2, "Al dia", 0, true, $cliente);

// Inciso F
echo "INCISO F \n";
echo "$" . $contrato1->calcularImporte() . "\n";
echo "$" . $contrato2->calcularImporte() . "\n";
echo "$" . $contrato3->calcularImporte() . "\n";

// Inciso G
echo "INCISO G \n";
$planIncorporado = $empresaCable->incorporarPlan($plan1);
if ($planIncorporado) {
    echo "PLAN INCORPORADO \n";
} else {
    echo "ERROR AL INCORPORAR PLAN \n";
}

//INCISO H
echo "INCISO H \n";
$planIncorporado = $empresaCable->incorporarPlan($plan2);
if ($planIncorporado) {
    echo "PLAN INCORPORADO \n";
} else {
    echo "ERROR AL INCORPORAR PLAN \n";
}

//INCISO I
echo "INCISO I \n";
$fechaHoy2 = date('Y-m-d');
$fechaVencimiento2 = date('Y-m-d', strtotime($fechaHoy2 . "+ 1 month"));
$empresaCable->incorporarContrato($plan2, $cliente, $fechaHoy2, $fechaVencimiento2, false);

//INCISO J
echo "INCISO J \n";
$empresaCable->incorporarContrato($plan1, $cliente, $fechaInicio2, $fechaVencimiento2, true);

//INCISO K
echo "INCISO K \n";
echo "$" . $empresaCable->pagarContrato($contrato3) . "\n";

//INCISO L
echo "INCISO L \n";
echo "$" . $empresaCable->pagarContrato($contrato1) . "\n";

//INCISO M
echo "INCISO M \n";
echo "$" . $empresaCable->retornarImporteContratos(111);
