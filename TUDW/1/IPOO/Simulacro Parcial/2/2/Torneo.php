<?php
class Torneo
{
    private $colPartidos;
    private $importePremio;

    public function __construct($colPartidos, $importePremio)
    {
        $this->colPartidos = $colPartidos;
        $this->importePremio = $importePremio;
    }

    // Observadoras
    public function getColPartidos()
    {
        return $this->colPartidos;
    }

    public function getImportePremio()
    {
        return $this->importePremio;
    }

    // Modificadoras
    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }

    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }

    // Metodos
    public function __toString()
    {
        return "Partidos: " . $this->mostrarColeccion($this->getColPartidos()) . "\n" .
        "Premio: $" . $this->getImportePremio() . "\n";
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

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipo)
    {
        $coleccionPartidos = $this->getColPartidos();
        $siguienteIdPartido = count($coleccionPartidos);
        $ingresoExitoso = false;

        if ($objEquipo1->getCategoria() == $objEquipo2->getCategoria() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()) {
            if ($tipo == "futbol") {
                $partido = new Futbol($idPartido, $fecha, $objEquipo1, $objEquipo2, 0, 0);
                array_push($coleccionPartidos, $partido);
                $this->setColPartidos($coleccionPartidos);
                $ingresoExitoso = true;
            } else if ($tipo == "basket") {
                $partido = new Basket($idPartido, $fecha, $objEquipo1, $objEquipo2, 0, 0, 0);
                array_push($coleccionPartidos, $partido);
                $this->setColPartidos($coleccionPartidos);
                $ingresoExitoso = true;
            }
        }

        return $ingresoExitoso;
    }

    public function darGanadores($deporte)
    {
        $coleccionPartidos = $this->getColPartidos();
        $coleccionGanadores = [];

        foreach ($coleccionPartidos as $objPartido) {
            if (get_class($objPartido) == $deporte) {
                $ganador = $objPartido->ganador();
                if (!is_null($ganador)) {
                    array_push($coleccionGanadores, $ganador);
                }
            }
        }

        return $coleccionGanadores;
    }

    public function calcularPremioPartido($objPartido)
    {
        $ganador = $objPartido->ganador();
        $importePremio = $this->getImportePremio();
        $datosPartido = [
            "equipoGanador" => null,
            "premioPartido" => 0,
        ];

        if (!is_null($ganador)) {
            $datosPartido = [
                "equipoGanador" => $ganador,
                "premioPartido" => $importePremio * $objPartido->coeficientePartido(),
            ];
        }

        return $datosPartido;
    }
}
