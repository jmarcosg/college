<?php

class CuentaAhorro extends Cuenta
{
    // Constructor
    public function __construct($saldoCueta, $objDuenio)
    {
        // Constructor Cuenta
        parent::__construct($saldoCuenta, $objDuenio);
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString();
    }

    public function realizarRetiro($monto)
    {
        $montoTotalRetirar = $this->getSaldoCuenta() - $monto;

        if ($montoTotalRetirar >= 0) {
            parent::realizarRetiro($monto);
        }
    }
}
