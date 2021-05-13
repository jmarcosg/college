<?php

class Ventas
{
    private $fecha;
    private $objPaquete; // Referencia al paquete
    private $cantidadPersonas;
    private $objCliente;

    public function __construct($fecha, $objPaquete, $cantidadPersonas, $objCliente)
    {
        $this->fecha = $fecha;
        $this->objPaquete = $objPaquete;
        $this->cantidadPersonas = $cantidadPersonas;
        $this->objCliente = $objCliente;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getObjPaquete()
    {
        return $this->objPaquete;
    }

    public function getCantidadPersonas()
    {
        return $this->cantidadPersonas;
    }

    public function getObjCliente()
    {
        return $this->objCliente;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setObjPaquete($objPaquete)
    {
        $this->objPaquete = $objPaquete;
    }

    public function setCantidadPersonas($cantidadPersonas)
    {
        $this->cantidadPersonas = $cantidadPersonas;
    }

    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    // Metodos
    public function darImporteVenta()
    {
        $paquete = $this->getObjPaquete();
        $dias = $paquete->getCantidadDias();
        $destino = $paquete->getObjDestino();
        $valorDestino = $destino->getValorPorDia();

        $importeFinal = $dias * $valorDestino * $this->getCantidadPersonas();

        return $importeFinal;
    }

    public function __toString()
    {
        return "Fecha: " . $this->getFecha() . "\n" .
        "Paquete: " . $this->getObjPaquete() . "\n" .
        "Cantidad de personas: " . $this->getCantidadPersonas() . "\n" .
        "Cliente: " . $this->getObjCliente() . "\n";
    }
}
