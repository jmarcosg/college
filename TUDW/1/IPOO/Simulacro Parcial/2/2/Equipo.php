<?php
class equipo
{
    private $nombre;
    private $nombreCapitan;
    private $cantJugadores;
    private $categoria;

    public function __construct($nombre, $nombreCapitan, $cantJugadores, $categoria)
    {
        $this->nombre = $nombre;
        $this->nombreCapitan = $nombreCapitan;
        $this->cantJugadores = $cantJugadores;
        $this->categoria = $categoria;
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

    public function getCategoria()
    {
        return $this->categoria;
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

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    // Metodos
    public function __toString()
    {
        return "Nombre del equipo: " . $this->getNombre() . "\n" .
        "Nombre del capitan: " . $this->getNombreCapitan() . "\n" .
        "Cantidad de jugadores: " . $this->getCantJugadores() . "\n" .
        "Categoria: " . $this->getCategoria() . "\n";
    }
}
