<?php
class Nacional extends Torneo
{
    // Constructor
    public function __construct($identificacion, $colPartidos, $montoPremio, $localidad)
    {
        parent::__construct($identificacion, $colPartidos, $montoPremio, $localidad);
    }

    // Metodos
    public function obtenerPremioTorneo()
    {
        $ganadorTorneo = $this->obtenerEquipoGanadorTorneo();
        $montoPremio = parent::obtenerPremioTorneo();

        $montoPremio = ($montoPremio * 1.10) * $cantidadPartidosGanados;

        return $montoPremio;
    }
}
