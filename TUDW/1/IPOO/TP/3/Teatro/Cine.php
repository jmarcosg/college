<?php

class Cine extends Funcion
{
    /**
     * Atributos
     * string $genero, $paisOrigen
     * float $porcentajeIncremento
     */
    private $genero;
    private $paisOrigen;
    private $porcentajeIncremento;

    // Constructor
    public function __construct($genero, $paisOrigen, $nombre, $horarioInicio, $duracionObra, $precio)
    {
        parent::__construct($nombre, $horarioInicio, $duracionObra, $precio);

        $this->genero = $genero;
        $this->paisOrigen = $paisOrigen;
        $this->porcentajeIncremento = 65;
    }

    // Observadoras
    public function getGenero()
    {
        return $this->genero;
    }

    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    public function getPorcentajeIncremento()
    {
        return $this->porcentajeIncremento;
    }

    // Modificadoras
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }

    public function setPorcentajeIncremento($porcentajeIncremento)
    {
        $this->porcentajeIncremento = $porcentajeIncremento;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() .
        "Genero: " . $this->getGenero() . "\n" .
        "País de origen: " . $this->getPaisOrigen() . "\n" .
        "Incremento: " . $this->getPorcentajeIncremento() . "% \n";
    }
}
