<?php
class MinisterioDeporte
{
    private $anio;
    private $colTorneos;

    public function __construct($anio, $colTorneos)
    {
        $this->anio = $anio;
        $this->colTorneos = $colTorneos;
    }

    // Observadoras
    public function getAnio()
    {
        return $this->anio;
    }

    public function getColTorneos()
    {
        return $this->colTorneos;
    }

    // Modificadoras
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    public function setColTorneos($colTorneos)
    {
        $this->colTorneos = $colTorneos;
    }

    // Metodos
    public function __toString()
    {
        return "Año: " . $this->getAnio() . "\n" .
        "Torneos organizados: " . $this->mostrarColeccion($this->getColTorneos()) . "\n";
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

    public function registrarTorneo($colPartidos, $tipo, $arrayAsociativo)
    {
        $montoPremio = $arrayAsociativo["montoPremio"];
        $nombreLocalidad = $arrayAsociativo["localidad"];
        $nombreProvincia = $arrayAsociativo["provincia"];
        $idTorneo = count($this->getColTorneos());

        // Segun el tipo de torneo a crear van a ser la cantidad de atributos del arreglo asocitivo
        if ($tipo == "provincial") {
            $torneo = new Provincial($idTorneo, $colPartidos, $montoPremio, $nombreLocalidad, $nombreProvincia);
        } else {
            $torneo = new Nacional($idTorneo, $colPartidos, $montoPremio, $nombreLocalidad);
        }

        return $torneo;
    }

    public function otorgarPremioTorneo($idTorneo)
    {
        $colTorneos = $this->getColTorneos();
        $montoPremio = $colTorneos->getMontoPremio();
        $equipoGanadorTorneo = $colTorneos->obtenerGanadorTorneo();
        $nombreEquipoGanador = $equipoGanadorTorneo["nombre"];
        $mensaje = "";

        if ($idTorneo == $ganadorTorneo) {
            $mensaje = $nombreEquipoGanador . " es el ganador del torneo. Gano: $" . $montoPremio;
        }

        return $mensaje;
    }
}
