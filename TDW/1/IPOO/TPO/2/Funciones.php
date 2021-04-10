<?php
class Funciones
{
    /**
     * Atributos
     * array $coleccionFunciones
     * string $nombreFuncion, $horarioInicio
     * int $duracionObra
     * float $precioFuncion
     */
    private $nombreFuncion;
    private $horarioInicio;
    private $duracionObra;
    private $precioFuncion;

    // Constructor
    public function __construct($nombreFuncion, $horarioInicio, $duracionObra, $precioFuncion)
    {
        $this->nombre = $nombreFuncion;
        $this->horario = $horarioInicio;
        $this->duracion = $duracionObra;
        $this->precio = $precioFuncion;
    }

    // Observadoras
    public function getNombreFuncion()
    {
        return $this->nombre;
    }

    public function getHorarioInicio()
    {
        return $this->horario;
    }

    public function getDuracionObra()
    {
        return $this->duracion;
    }

    public function getPrecioFuncion()
    {
        return $this->precio;
    }

    // Modificadoras
    public function setNombre($nombreFuncion)
    {
        $this->nombre = $nombreFuncion;
    }

    public function setHorario($horarioInicio)
    {
        $this->horario = $horarioInicio;
    }

    public function setDuracion($duracionObra)
    {
        $this->duracion = $duracionObra;
    }

    public function setPrecio($precioFuncion)
    {
        $this->precio = $precioFuncion;
    }

    // Metodos
    /**
     * Convierte una hora en formato hh:mm a un total de n minutos
     */
    public function convertirHorasAMinutos()
    {
        /** Declaracion de variables
         * string $hora
         * int $horas, $minutos, $totalMinutos
         */
        $hora = $this->getHorarioInicio();
        $minutos = 0;

        if (strpos($hora, ':') !== false) {
            // Separo la hora de los minutos
            list($horas, $minutos) = explode(':', $horas);
        }
        $totalMinutos = $horas * 60 + $minutos;

        return $totalMinutos;
    }

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
            if ($this->funcionesTeatro[$i]->getNombreFuncion() == $funcionBuscada) {
                $indiceFuncion = $i;
            } else {
                $i++;
            }
        }
        return $indiceFuncion;
    }

    public function __toString()
    {
        return "\tNombre: " . $this->getNombreFuncion() . "\n\tHora Inicio: " . $this->getHoraInicio() . $this->getHorarioInicio() . "\n\tDuracion: " . $this->getDuracionObra() . " minutos" . "\n\tPrecio: $" . $this->getPrecioFuncion();
    }

}
