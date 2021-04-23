<?php
class CuentaCorriente extends Cuenta
{
    // Atributos
    private $montoMaximoDescubierto;

    // Constructor CuentaCorriente
    public function __construct($montoMaximoDescubierto, $saldoCuenta, $objDuenio)
    {
        // Constructor Cuenta
        parent::__construct($saldoCuenta, $objDuenio);

        $this->montoMax = $montoMaximoDescubierto;
    }

    // Observadoras
    public function getMontoMaximoDescubierto()
    {
        return $this->montoMax;
    }

    // Modificadoras
    public function setMontoMax($montoMaximoDescubierto)
    {
        $this->montoMax = $montoMaximoDescubierto;
    }

    // Metodos
    public function __toString()
    {
        $mensaje = parent::__toString();

        $mensaje .= "Monto maximo descubierto: " . $this->getMontoMaximoDescubierto() . "\n";

        return $mensaje;
    }

    public function realizarRetiro($monto)
    {
        $montoTotalRetirar = $this->getSaldoCuenta() + $this->getMontoMaximoDescubierto();

        if ($monto <= $montoTotalRetirar) {
            parent::realizarRetiro($monto);
        }
    }
}
