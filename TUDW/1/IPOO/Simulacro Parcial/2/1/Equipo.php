<?php
class equipo
{
    private $nombre;
    private $nombreCapitan;
    private $cantJugadores;

    public function __construct($nombre, $nombreCapitan, $cantJugadores)
    {
        $this->nombre = $nombre;
        $this->nombreCapitan = $nombreCapitan;
        $this->cantJugadores = $cantJugadores;
    }

    // Observadoras
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNombreCapitan()
    {
        return $this->nombreCapitan;
    }

    public function getCantJugadores()
    {
        return $this->cantJugadores;
    }

    // Modificadoras
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setNombreCapitan($nombreCapitan)
    {
        $this->nombreCapitan = $nombreCapitan;
    }

    public function setCantJugadores($cantJugadores)
    {
        $this->cantJugadores = $cantJugadores;
    }

    // Metodos
    public function __toString()
    {
        return "Nombre del equipo: " . $this->getNombre() . "\n" .
        "Nombre del capitan: " . $this->getNombreCapitan() . "\n" .
        "Cantidad de jugadores: " . $this->getCantJugadores() . "\n";
    }
}
