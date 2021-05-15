<?php

class Musical extends Funcion
{
    /**
     * Atributos
     * string $director
     * int $cantidadPersonasEnEscena
     * float $porcentajeIncremento
     */
    private $director;
    private $cantidadPersonasEnEscena;
    private $porcentajeIncremento;

    // Constructor
    public function __construct($director, $cantidadPersonasEnEscena, $nombre, $horarioInicio, $duracionObra, $precio)
    {
        parent::__construct($nombre, $horarioInicio, $duracionObra, $precio);

        $this->director = $director;
        $this->cantidadPersonasEnEscena = $cantidadPersonasEnEscena;
        $this->porcentajeIncremento = 12;
    }

    // Observadoras
    public function getDirector()
    {
        return $this->director = $director;
    }

    public function getCantidadPersonasEnEscena()
    {
        return $this->cantidadPersonasEnEscena = $cantidadPersonasEnEscena;
    }

    public function getPorcentajeIncremento()
    {
        return $this->porcentajeIncremento;
    }

    // Modificadoras
    public function setDirector($director)
    {
        $this->director = $director;
    }

    public function setCantidadPersonasEnEscena($cantidadPersonasEnEscena)
    {
        $this->cantidadPersonasEnEscena = $cantidadPersonasEnEscena;
    }

    public function setPorcentajeIncremento($porcentajeIncremento)
    {
        $this->porcentajeIncremento = $porcentajeIncremento;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() .
        "Director: " . $this->getDirector() . "\n" .
        "Cantidad de personas en escena: " . $this->getCantidadPersonasEnEscena() . "\n" .
        "Incremento: " . $this->getPorcentajeIncremento() . "% \n";
    }
}
