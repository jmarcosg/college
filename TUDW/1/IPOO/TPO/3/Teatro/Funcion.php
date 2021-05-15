<?php
class Funcion
{
    /**
     * Atributos
     * string $nombre, $horarioInicio
     * int $duracion
     * float $precio
     */
    private $nombre;
    private $horarioInicio;
    private $duracion;
    private $precio;

    // Constructor
    public function __construct($nombre, $horarioInicio, $duracion, $precio)
    {
        $this->nombre = $nombre;
        $this->horarioInicio = $horarioInicio;
        $this->duracion = $duracion;
        $this->precio = $precio;
    }

    // Observadoras
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getHorarioInicio()
    {
        return $this->horarioInicio;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    // Modificadoras
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setHorarioInicio($horarioInicio)
    {
        $this->horarioInicio = $horarioInicio;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    // Metodos
    /**
     * Convierte una hora en formato hh:mm a un total de n minutos
     */
    public function convertirHorasAMinutos()
    {
        /** Declaracion de variables
         * array $horasMinutos
         * string $horaInicio
         * int $totalMinutos
         */

        // Inicializacion de variables
        $horario = $this->getHorarioInicio();
        $horasMinutos = [];
        $totalMinutos = 0;

        // Separo las horas de los minutos y guardo ambos valores en un array
        $horasMinutos = explode(":", $horario);

        // Almaceno individualmente en sus variables correspondientes
        $horas = $horasMinutos[0];
        $minutos = $horasMinutos[1];

        // Convierto ambos strings a enteros y luego los sumo al total de minutos
        $horas = intval($horas);
        $minutos = intval($minutos);

        $totalMinutos = ($horas * 60) + $minutos;

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
            if ($this->funcionesTeatro[$i]->getNombre() == $funcionBuscada) {
                $indiceFuncion = $i;
            } else {
                $i++;
            }
        }
        return $indiceFuncion;
    }

    public function __toString()
    {
        return "\tNombre: " . $this->getNombre() . "\n" .
        "\tHora Inicio: " . $this->getHorarioInicio() . "\n" .
        "\tDuracion: " . $this->getDuracion() . " minutos" . "\n" .
        "\tPrecio: $" . $this->getPrecio() . "\n";
    }

}
