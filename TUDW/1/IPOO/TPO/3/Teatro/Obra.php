<?php
class Obra extends Funcion
{
    /**
     * Atributos
     * float $porcentajeIncremento
     */
    private $porcentajeIncremento;

    // Constructor
    public function __construct($nombre, $horarioInicio, $duracion, $precio)
    {
        parent::__construct($nombre, $horarioInicio, $duracion, $precio);

        $this->porcentajeIncremento = 45;
    }

    // Observadoras
    public function getPorcentajeIncremento()
    {
        return $this->porcentajeIncremento;
    }

    // Modificadoras
    public function setPorcentajeIncremento($porcentajeIncremento)
    {
        $this->porcentajeIncremento = $porcentajeIncremento;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "\n" .
        "\tIncremento: " . $this->getPorcentajeIncremento() . "% \n";
    }
}
