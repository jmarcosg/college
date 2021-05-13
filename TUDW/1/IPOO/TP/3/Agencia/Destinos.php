<?php

class Destinos
{
    private $identificacion;
    private $nombreDelLugar;
    private $valorPorDia;

    public function __construct($identificacion, $nombreDelLugar, $valorPorDia)
    {
        $this->identificacion = $identificacion;
        $this->nombreDelLugar = $nombreDelLugar;
        $this->valorPorDia = $valorPorDia;
    }

    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function getNombreDelLugar()
    {
        return $this->nombreDelLugar;
    }

    public function getValorPorDia()
    {
        return $this->valorPorDia;
    }

    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function setNombreDelLugar($nombreDelLugar)
    {
        $this->nombreDelLugar = $nombreDelLugar;
    }

    public function setValorPorDia($valorPorDia)
    {
        $this->valorPorDia = $valorPorDia;
    }

    public function __toString()
    {
        return "Identificacion: " . $this->getIdentificacion() . "\n" .
        "Nombre del lugar: " . $this->getNombreDelLugar() . "\n" .
        "Valor por dia: " . $this->getValorPorDia() . "\n";
    }
}
