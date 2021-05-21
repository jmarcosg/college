<?php
class Basket extends Partido
{
    private $cantidadInfracciones;

    public function __construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2, $cantidadInfracciones)
    {
        parent::__construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2);

        $this->cantidadInfracciones = $cantidadInfracciones;
    }

    // Observadoras
    public function getCantidadInfracciones()
    {
        return $this->cantidadInfracciones;
    }

    // Modificadoras
    public function setCantidadInfracciones($cantidadInfracciones)
    {
        $this->cantidadInfracciones = $cantidadInfracciones;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "\n" .
        "Infracciones: " . $this->getCantidadInfracciones();
    }

    public function coeficientePartido()
    {
        $coeficiente = parent::coeficienteBase();
        $coeficiente -= 0.75 * $this->getCantidadInfracciones();
        return $coeficiente;
    }
}
