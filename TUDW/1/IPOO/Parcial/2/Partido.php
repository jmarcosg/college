<?php
class Partido
{
    private $idPartido;
    private $equipo1;
    private $equipo2;
    private $fecha;
    private $cantGolesE1;
    private $cantGolesE2;

    public function __construct($idPartido, $equipo1, $equipo2, $fecha, $cantGolesE1, $cantGolesE2)
    {
        $this->idPartido = $idPartido;
        $this->equipo1 = $equipo1;
        $this->equipo2 = $equipo2;
        $this->fecha = $fecha;
        $this->cantGolesE1 = $cantGolesE1;
        $this->cantGolesE2 = $cantGolesE2;
    }

    // Observadoras
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    public function getEquipo1()
    {
        return $this->equipo1;
    }

    public function getEquipo2()
    {
        return $this->equipo2;
    }

    public function getFecha()
    {
        return $this->fecha;
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

    public function setEquipo1($equipo1)
    {
        $this->equipo1 = $equipo1;
    }

    public function setEquipo2($equipo2)
    {
        $this->equipo2 = $equipo2;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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

    public function obtenerGanador()
    {
        $equipoGanador = null;
        $golesE1 = $this->getCantGolesE1();
        $golesE2 = $this->getCantGolesE2();
        $datosEquipoGanador = [
            "objEquipo" => null,
            "cantGoles" => 0,
        ];

        if ($golesE1 > $golesE2) {
            $equipoGanador = $this->getEquipo1();
            $datosEquipoGanador = [
                "objEquipo" => $equipoGanador,
                "cantGoles" => $golesE1,
            ];
        } else if ($golesE2 > $golesE1) {
            $equipoGanador = $this->getEquipo2();
            $datosEquipoGanador = [
                "objEquipo" => $equipoGanador,
                "cantGoles" => $golesE2,
            ];
        }
        return $datosEquipoGanador;
    }
}
