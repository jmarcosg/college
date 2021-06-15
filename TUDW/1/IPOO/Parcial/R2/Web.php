<?php

class Web extends Contrato
{
    private $porcentajeDescuento; // POR DEFECTO 10%

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRenueva, $objCliente, $porcentajeDescuento)
    {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRenueva, $objCliente);

        $this->porcentajeDescuento = 10;
    }

    // Observadoras
    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    // Modificadoras
    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "\n" .
        "Descuento: %" . $this->getPorcentajeDescuento();
    }

    public function calcularImporte()
    {
        $importeFinal = parent::calcularImporte();
        $porcentajeDescuento = $this->getPorcentajeDescuento / 100;
        $montoADescontar = $importeFinal * $porcentajeDescuento;
        $importeFinal -= $montoADescontar;

        return $importeFinal;
    }
}
