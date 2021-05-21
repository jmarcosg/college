<?php

class Partido
{
    private $idPartido;
    private $fecha;
    private $cantGolesE1;
    private $cantGolesE2;

    public function __construct($idPartido, $fecha, $cantGolesE1, $cantGolesE2)
    {
        $this->idPartido = $idPartido;
        $this->fecha = $fecha;
        $this->cantGolesE1 = 0;
        $this->cantGolesE2 = 0;
    }

    // Observadoras
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCantGolesE1()
    {
        return $this->cantGolesE1;
    }

    public function getCantGolesE2()
    {
        return $this->cantGolesE2;
    }

    // Modificadoras
    public function setIdPartido($idPartido)
    {
        $this->idPartido = $idPartido;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setCantGolesE1($cantGolesE1)
    {
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function setCantGolesE2($cantGolesE2)
    {
        $this->cantGolesE2 = $cantGolesE2;
    }

    // Metodos
    public function __toString()
    {
        return "ID Partido: " . $this->getIdPartido() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Cantidad goles equipo 1: " . $this->getCantGolesE1() . "\n" .
        "Cantidad goles equipo 2: " . $this->getCantGolesE2() . "\n";
    }
}
