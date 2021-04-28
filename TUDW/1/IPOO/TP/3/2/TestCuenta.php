<?php
include "Owner.php";
include 'Cuenta.php';
include 'CuentaCorriente.php';
include 'CuentaAhorro.php';

$duenio = new Owner("Pepito", "Perez", "DNI", 12353734);

$ctaCorriente = new CuentaCorriente(5000, 0, $duenio);
$ctaAhorro = new CuentaAhorro(5000, $duenio);

echo $ctaCorriente;

$ctaCorriente->realizarDeposito(2000);
echo get_class($ctaCorriente) . ". Saldo luego de deposito: " . $ctaCorriente->saldoCuenta() . "\n";

$ctaCorriente->realizarRetiro(1000);
echo get_class($ctaCorriente) . ". Saldo luego de extraccion: " . $ctaCorriente->saldoCuenta() . "\n";

echo $ctaAhorro;

$ctaAhorro->realizarDeposito(2000);
echo get_class($ctaAhorro) . ". Saldo luego de deposito: " . $ctaAhorro->saldoCuenta() . "\n";

$ctaAhorro->realizarRetiro(10000);
echo get_class($ctaAhorro) . ". Saldo luego de extraccion: " . $ctaAhorro->saldoCuenta() . "\n";
