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
        $datosEquipoGanador = [
            "equipoGanador" => null,
            "cantidadGolesEnTorneo" => 0,
        ];
        $cantGoles = 0;
        $coleccionPartidos = $this->getColPartidos();
        $coleccionEquiposGanadores = null;

        // Armo una coleccion con los equipos ganadores
        foreach ($coleccionPartidos as $partido) {
            $equipoGanador = $partido->obtenerGanador();
            array_push($coleccionEquiposGanadores, $equipoGanador);
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
