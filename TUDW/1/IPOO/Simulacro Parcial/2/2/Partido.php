<?php

class Partido
{
    private $idPartido;
    private $fecha;
    private $objEquipo1;
    private $objEquipo2;
    private $cantGolesE1;
    private $cantGolesE2;

    public function __construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2)
    {
        $this->idPartido = $idPartido;
        $this->fecha = $fecha;
        $this->objEquipo1 = $objEquipo1;
        $this->objEquipo2 = $objEquipo2;
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

    public function getObjEquipo1()
    {
        return $this->objEquipo1;
    }

    public function getObjEquipo2()
    {
        return $this->objEquipo2;
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

    public function setObjEquipo1($objEquipo1)
    {
        $this->equipo1 = $equipo1;
    }

    public function setObjEquipo2($objEquipo2)
    {
        $this->equipo2 = $equipo2;
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

    public function coeficienteBase()
    {
        $coefBase = 0.5;
        $cantidadGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantidadJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();

        $coeficienteFinal = $coefBase * $cantidadGoles * $cantidadJugadores;

        return $coeficienteFinal;
    }
}
