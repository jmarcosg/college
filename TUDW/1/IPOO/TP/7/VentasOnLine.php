<?php

class VentaOnLine extends Ventas
{
    private $porcentajeDescuento;

    public function __construct($fecha, $objPaquete, $cantidadPersonas, $objCliente)
    {
        parent::__construct($fecha, $objPaquete, $cantidadPersonas, $objCliente);

        $this->porcentajeDescuento = 20;
    }

    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    // Metodos
    public function darImporteVenta()
    {
        $importeVenta = parent::darImporteVenta();

        $importeFinal = $importeVenta - ($importeVenta * $this->getPorcentajeDescuento() / 100);

        return $importeFinal;
    }

    public function __toString()
    {
        return parent::__toString() . "Porcentaje de descuento: " . $this->getPorcentajeDescuento() . "% \n";
    }

}
