<?php
class Torneos
{
    private $identificacion;
    private $colPartidos;
    private $montoPremio;
    private $localidad;

    public function __construct($identificacion, $colPartidos, $montoPremio, $localidad)
    {
        $this->identificacion = $identificacion;
        $this->colPartidos = $colPartidos;
        $this->montoPremio = $montoPremio;
        $this->localidad = $localidad;
    }

    // Observadoras
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function getColPartidos()
    {
        return $this->colPartidos;
    }

    public function getMontoPremio()
    {
        return $this->montoPremio;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    // Modificadoras
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }

    public function setMontoPremio($montoPremio)
    {
        $this->montoPremio = $montoPremio;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    // Metodos
    public function __toString()
    {
        return "Partidos: " . $this->mostrarColeccion($this->getColPartidos()) . "\n" .
        "Monto del premio: $" . $this->getMontoPremio() . "\n" .
        "Localidad donde se jugó: " . $this->getLocalidad() . "\n" .
        "ID: " . $this->getIdentificacion() . "\n";
    }

    public function mostrarColeccion($coleccion)
    {
        $arregloStr = "";
        $array = $coleccion;
        $contador = count($array);

        for ($i = 0; $i < $contador; $i++) {
            $arregloStr .= $array[$i] . "\n";
            $arregloStr .= "---------------\n";
        }

        return $arregloStr;
    }

    public function obtenerEquipoGanadorTorneo()
    {
        $coleccionPartidos = $this->getColPartidos();
        $cantGoles = 0;
        $cantPartidosGanados = 0;
        $maxCantPartidosGanados = 0;
        $datosEquipoGanador = [
            "equipoGanador" => null,
            "cantidadGolesEnTorneo" => 0,
        ];
        $coleccionGanadores = null;
        $i = 0;

        // Armo una coleccion de los equipos ganadores
        foreach ($coleccionPartidos as $objPartido) {
            $ganadorPartido = $objPartido->obtenerGanador();
            array_push($coleccionGanadores, $ganadorPartido);
        }

        for ($i = 0; count($coleccionGanadores); $i++) {
            $nombreEquipo = $coleccionGanadores[$i]["nombre"];

            if ($nombreEquipo == $coleccionGanadores[$i]["nombre"]) {
                $cantPartidosGanados++;
            }
        }

        $maxCantPartidosGanados = $cantPartidosGanados;

        for ($i = 1; count($coleccionGanadores); $i++) {
            $nombreEquipo = $coleccionGanadores[$i]["nombre"];

            for ($j = 1; count($coleccionGanadores); $j++) {
                if ($nombreEquipo == $coleccionGanadores[$j]["nombre"]) {
                    $cantPartidosGanados++;
                }
            }
        }

        return $datosEquipoGanador;
    }

    public function obtenerPremioTorneo()
    {
        $equipoGanador = $this->obtenerEquipoGanadorTorneo();
        $montoPremio = $this->getMontoPremio();

        return $montoPremio;
    }

}
