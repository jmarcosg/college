<?php
class Provincial extends Torneo
{
    private $provincia;

    public function __construct($identificacion, $colPartidos, $montoPremio, $localidad, $provincia)
    {
        parent::__construct($identificacion, $colPartidos, $montoPremio, $localidad);

        $this->provincia = $provincia;
    }

    // Observadoras
    public function getProvincia()
    {
        return $this->provincia;
    }

    // Modificadoras
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "\n" .
        "Provincia: " . $this->getProvincia();
    }
}
