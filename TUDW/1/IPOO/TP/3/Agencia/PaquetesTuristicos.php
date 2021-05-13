<?php

class PaquetesTuristicos
{
    private $fechaDesde;
    private $cantidadDias;
    private $objDestino;
    private $cantidadTotalPlazas;
    private $cantidadDisponiblePlazas;

    public function __construct($fechaDesde, $cantidadDias, $objDestino, $cantidadTotalPlazas)
    {
        $this->fechaDesde = $fechaDesde;
        $this->cantidadDias = $cantidadDias;
        $this->objDestino = $objDestino;
        $this->cantidadTotalPlazas = $cantidadTotalPlazas;
        $this->cantidadDisponiblePlazas = $cantidadTotalPlazas;
    }

    // Observadoras

    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    public function getCantidadDias()
    {
        return $this->cantidadDias;
    }

    public function getObjDestino()
    {
        return $this->objDestino;
    }

    public function getCantidadTotalPlazas()
    {
        return $this->cantidadTotalPlazas;
    }

    public function getCantidadDisponiblePlazas()
    {
        return $this->cantidadDisponiblePlazas;
    }

    // Modificadoras

    public function setCantidadDisponiblePlazas($cantidadDisponiblePlazas)
    {
        $this->cantidadDisponiblePlazas = $cantidadDisponiblePlazas;
    }

    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;
    }

    public function setCantidadDias($cantidadDias)
    {
        $this->cantidadDias = $cantidadDias;
    }

    public function setObjDestino($objDestino)
    {
        $this->objDestino = $objDestino;
    }

    public function setCantidadTotalPlazas($cantidadTotalPlazas)
    {
        $this->cantidadTotalPlazas = $cantidadTotalPlazas;
    }

    // Metodos
    public function __toString()
    {
        return "Fecha desde: " . $this->getFechaDesde() . "\n" .
        "Cantidad dias: " . $this->getCantidadDias() . "\n" .
        "Destino: " . $this->getObjDestino() . "\n" .
        "Cantidad total plazas: " . $this->getCantidadTotalPlazas() . "\n" .
        "Cantidad disponible plazas: " . $this->getCantidadDisponiblePlazas() . "\n";
    }
}
