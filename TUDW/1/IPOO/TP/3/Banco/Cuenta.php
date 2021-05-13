<?php

class Cuenta
{
    // Atributos
    private $saldoCuenta;
    private $objDuenio;

    // Constructor Cuenta
    public function __construct($saldoCuenta, $objDuenio)
    {
        $this->saldo = $saldoCuenta;
        $this->duenio = $objDuenio;
    }

    // Observadoras
    public function getSaldoCuenta()
    {
        return $this->saldo;
    }

    public function getObjDuenio()
    {
        return $this->duenio;
    }

    // Modificadoras
    public function setSaldo($saldoCuenta)
    {
        $this->saldo = $saldoCuenta;
    }

    public function setDuenio($objDuenio)
    {
        $this->duenio = $objDuenio;
    }

    // Metodos
    public function __toString()
    {
        return "Saldo disponible: " . $this->getSaldoCuenta() . "\n" .
        "Dueño: " . $this->getObjDuenio();
    }

    public function saldoCuenta()
    {
        return $this->getSaldoCuenta();
    }

    public function realizarDeposito($monto)
    {
        $montoTotal = $this->getSaldoCuenta() + $monto;
        $this->setSaldo($montoTotal);
    }

    public function realizarRetiro($monto)
    {
        $montoTotal = $this->getSaldoCuenta() - $monto;
        $this->setSaldo($montoTotal);
    }
}
