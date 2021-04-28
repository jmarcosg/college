<?php
class Teatro
{
    /**
     * Atributos
     * array $objFuncionesTeatro
     * string $nombreTeatro, $direccionTeatro
     */
    private $nombreTeatro;
    private $direccionTeatro;
    private $objFuncionesTeatro;

    // Constructor
    public function __construct($nombreTeatro, $direccionTeatro)
    {
        $this->nombre = $nombreTeatro;
        $this->direccion = $direccionTeatro;
        $this->funciones = [];
    }

    // Observadoras
    public function getNombreTeatro()
    {
        return $this->nombre;
    }

    public function getDireccionTeatro()
    {
        return $this->direccion;
    }

    public function getFuncionesTeatro()
    {
        return $this->funciones;
    }

    // Modificadoras
    public function setNombre($nombreTeatro)
    {
        $this->nombre = $nombreTeatro;
    }

    public function setDireccion($direccionTeatro)
    {
        $this->direccion = $direccionTeatro;
    }

    public function setFunciones($objFuncionesTeatro)
    {
        $this->funciones = $objFuncionesTeatro;
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

        while ($i < count($this->funciones) && $indiceFuncion == -1) {
            if ($this->funcionesTeatro[$i]->getNombre() == $funcionBuscada) {
                $indiceFuncion = $i;
            } else {
                $i++;
            }
        }
        return $indiceFuncion;
    }

    /**
     * Verifica si dos funciones se solapan con sus horarios
     * @param obj $nuevaFuncion
     */
    public function verificarSolapamiento($nuevaFuncion)
    {
        /**
         * Declaracion de variables
         * int $i, $duracionFuncion, $cantFunciones, $totalMinutos
         * boolean $funcionSolapada
         */

        // Inicializacion de variables
        $funcionSolapada = false;
        $i = 0;
        $cantFunciones = count($this->funciones);

        /**
         * Busco si la funcion a agregar se solapa con otra
         * Para esto: recorro la coleccion buscando la duracion y la hora la funcion convirtiendo esta ultima a minutos sumando ambas a un total de n minutos
         * Si la duracion de la nueva funcion convertida a minutos es mayor al total
         * o si la hora de la funcion es mayor a la suma de la nueva funcion + la duracion en minutos, NO SE SOLAPA
         * De lo contraraio, SE SOLAPA
         */
        while (!$funcionSolapada && $i < $cantFunciones) {
            if ($nuevaFuncion->getNombre() != $this->funciones[$i]->getNombre()) {
                $duracionFuncion = $this->funciones[$i]->getDuracion();
                $horaFuncion = $this->funciones[$i]->convertirHorasAMinutos();
                $totalMinutos = $duracion + $horaFuncion;

                if ($nuevaFuncion->convertirHorasAMinutos() > $totalMinutos || $horaFuncion > $nuevaFuncion->convertirHorasAMinutos() + $nuevaFuncion->getDuracion()) {
                    $funcionSolapada = false;
                    $i++;
                } else {
                    $funcionSolapada = true;
                }
            } else {
                $i++;
            }

            return $funcionSolapada;
        }
    }

    public function __toString()
    {
        return "Teatro: " . $this->getNombreTeatro() . "\n" .
        "Direccion: " . $this->getDireccionTeatro() . "\n" .
            "Funciones: \n";
    }

    public function ordenarFuncionesCronologicamente()
    {
        /**
         * Declaracion de variables
         * int $cantFunciones, $i, $j
         * obj $funcionesOrdenadas
         * boolean $yaSeOrdeno
         */

        // Inicializacion de variables
        $yaSeOrdeno = false;
        $i = 0;
        $cantFunciones = count($this->funciones);

        while ($i < $cantFunciones && !$yaSeOrdeno) {
            $yaSeOrdeno = true;

            for ($j = 0; $j < $cantFunciones - $i - 1; $j++) {
                if ($this->funciones[$j]->convertirHorasAMinutos() > $this->funciones[$j + 1]->convertirHorasAMinutos()) {
                    $funcionesOrdenadas = $this->funciones[$j];
                    $this->funciones[$j] = $this->funciones[$j + 1];
                    $this->funciones[$j + 1] = $funcionesOrdenadas;
                    $yaSeOrdeno = false;
                }
            }
            $i++;
        }
    }
}
