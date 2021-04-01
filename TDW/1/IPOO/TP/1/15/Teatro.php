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
    /**
     * Busca la existencia de una funcion requerida
     * De ser asi, devuelve la posicion en la que se encuentra
     */
    public function buscarFuncion($funcionBuscada)
    {
        /**
         * Declaracion de variables
         * int $indiceFuncion, $i
         * string $funcionBuscada
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

    /**
     * Modifica y reemplaza valores de un funcion por unos nuevos
     */
    public function modificarFuncion($indiceFuncion, $nuevoNombreFuncion, $nuevoPrecioFuncion)
    {
        /** Declaracion de variables
         * int $indiceFuncion
         * float $nuevoPrecioFuncion
         * string $nuevoNombreFuncion
         */
        $this->funcionesTeatro[$indiceFuncion]["nombre"] = $nuevoNombreFuncion;
        $this->funcionesTeatro[$indiceFuncion]["precio"] = $nuevoPrecioFuncion;
    }

    public function __toString()
    {
        return "Teatro: " . $this->nombreTeatro . "\n" . "Direccion: " . $this->direccionTeatro . "\n";
    }
}
