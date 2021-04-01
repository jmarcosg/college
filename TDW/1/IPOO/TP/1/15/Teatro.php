<?php
class Teatro
{
    // Atributos
    private $funciones;
    private $nombre;
    private $direccion;

    // Constructor
    public function __construct($nombre, $direccion, $funciones)
    {
        $this->nombreTeatro = $nombre;
        $this->direccionTeatro = $direccion;
        $this->funcionesTeatro = $funciones;
    }

    // Observadoras
    public function getNombreTeatro()
    {
        return $this->nombreTeatro;
    }

    public function getDireccionTeatro()
    {
        return $this->direccionTeatro;
    }

    public function getFunciones()
    {
        return $this->funcionesTeatro;
    }

    public function setNombreTeatro($nombre)
    {
        $this->nombreTeatro = $nombre;
    }

    public function setDireccionTeatro($direccion)
    {
        $this->direccionTeatro = $direccion;
    }

    // Metodos
    public function buscarFuncion($funcionBuscada)
    {
        /**
         * Declaracion de variables
         * int $indiceFuncion, $i
         */

        // Inicializacion de variables
        $indiceFuncion = -1;
        $i = 0;

        while ($i < count($this->funcionesTeatro) && $indiceFuncion == -1) {
            if ($this->funcionesTeatro[$i]["nombre"] == $funcionBuscada) {
                $indiceFuncion = $i;
            } else {
                $i++;
            }
        }
        return $indiceFuncion;
    }

    public function modificarFuncion($indiceFuncion, $nuevoNombreFuncion, $nuevoPrecioFuncion)
    {
        $this->funcionesTeatro[$indiceFuncion]["nombre"] = $nuevoNombreFuncion;
        $this->funcionesTeatro[$indiceFuncion]["precio"] = $nuevoPrecioFuncion;
    }

    public function __toString()
    {
        return "Teatro: " . $this->nombreTeatro . "\n" . "Direccion: " . $this->direccionTeatro . "\n";
    }
}
