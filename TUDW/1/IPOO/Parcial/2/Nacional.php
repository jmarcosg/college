<?php
class Nacional extends Torneo
{
    // Constructor
    public function __construct($identificacion, $colPartidos, $montoPremio, $localidad)
    {
        parent::__construct($identificacion, $colPartidos, $montoPremio, $localidad);
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "\n" .
        "Provincia: " . $this->getProvincia();
    }

    public function obtenerPremioTorneo()
    {
        $ganadorTorneo = parent::obtenerEquipoGanadorTorneo();
        $cantidadPartidosGanados = $ganadorTorneo["partidosGanados"];
        $montoPremio = parent::obtenerPremioTorneo();

        $montoPremio = ($montoPremio * 1.10) * $cantidadPartidosGanados;

        return $montoPremio;
    }
}
