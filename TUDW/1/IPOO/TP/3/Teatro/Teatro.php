<?php
class Teatro
{
    /**
     * Atributos
     * obj $colFuncionesTeatro
     * string $nombreTeatro, $direccionTeatro
     */
    private $nombreTeatro;
    private $direccionTeatro;
    private $colFuncionesTeatro;

    // Constructor
    public function __construct($nombreTeatro, $direccionTeatro)
    {
        $this->nombre = $nombreTeatro;
        $this->direccion = $direccionTeatro;
        $this->colFunciones = [];
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

    public function getColFuncionesTeatro()
    {
        return $this->colFunciones;
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

    public function setColFuncionesTeatro($colFuncionesTeatro)
    {
        $this->colFunciones = $colFuncionesTeatro;
    }

    // Metodos
    public function __toString()
    {
        return "Teatro: " . $this->getNombreTeatro() . "\n" .
        "Direccion: " . $this->getDireccionTeatro() . "\n" .
        "Funciones: \n" . $this->mostrarColeccion($this->getColFuncionesTeatro()) . "\n";
    }

    private function mostrarColeccion($coleccion)
    {
        $mensaje = "";
        $array = $coleccion;
        $cantidadFunciones = count($array);

        for ($i = 0; $i < $cantidadFunciones; $i++) {
            $mensaje .= $array[$i] . "\n";
            $mensaje .= "---------------\n";
        }

        return $mensaje;
    }

    /**
     * Busca la existencia de una funcion requerida
     * De ser asi, devuelve la posicion en la que se encuentra
     */
    public function buscarFuncion($nombreFuncionBuscada)
    {
        /**
         * Declaracion de variables
         * int $indiceFuncion, $i
         * string $nombreFuncionBuscada
         * array $arrayFunciones
         */

        // Inicializacion de variables
        // $arrayFunciones = $this->getColFuncionesTeatro();
        $indiceFuncion = -1;
        $i = 0;

        while ($i < count($this->getColFuncionesTeatro()) && $indiceFuncion == -1) {
            if ($this->getColFuncionesTeatro()[$i]->getNombre() == $nombreFuncionBuscada) {
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
        $colFunciones = $this->getColFuncionesTeatro();
        $cantidadFunciones = count($this->getColFuncionesTeatro());

        /**
         * Busco si la funcion a agregar se solapa con otra
         * Para esto: recorro la coleccion buscando la duracion y la hora la funcion convirtiendo esta ultima a minutos sumando ambas a un total de n minutos
         * Si la duracion de la nueva funcion convertida a minutos es mayor al total
         * o si la hora de la funcion es mayor a la suma de la nueva funcion + la duracion en minutos, NO SE SOLAPA
         * De lo contraraio, SE SOLAPA
         */
        while (!$funcionSolapada && $i < $cantidadFunciones) {
            if ($nuevaFuncion->getNombre() != $this->colFunciones[$i]->getNombre()) {
                $duracionFuncion = $colFunciones[$i]->getDuracion();
                $horaFuncion = $colFunciones[$i]->convertirHorasAMinutos();
                $totalMinutos = $duracionFuncion + $horaFuncion;

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

    public function ordenarFuncionesCronologicamente()
    {
        /**
         * Declaracion de variables
         * int $cantidadFunciones, $i, $j
         * objCol $colFuncionesOrdenadas
         * boolean $yaSeOrdeno
         */

        // Inicializacion de variables
        $yaSeOrdeno = false;
        $i = 0;
        $cantidadFunciones = count($this->getColFuncionesTeatro());

        while ($i < $cantidadFunciones && !$yaSeOrdeno) {
            $yaSeOrdeno = true;

            for ($j = 0; $j < $cantidadFunciones - $i - 1; $j++) {
                if ($this->colFunciones[$j]->convertirHorasAMinutos() > $this->colFunciones[$j + 1]->convertirHorasAMinutos()) {
                    $colFuncionesOrdenadas = $this->colFunciones[$j];
                    $this->colFunciones[$j] = $this->colFunciones[$j + 1];
                    $this->colFunciones[$j + 1] = $colFuncionesOrdenadas;
                    $yaSeOrdeno = false;
                }
            }
            $i++;
        }
    }

    public function darCostos()
    {
        $coleccionFunciones = $this->getColFuncionesTeatro();
        $total = 0;

        foreach ($coleccionFunciones as $objFuncion) {
            $precioFuncion = $objFuncion->getPrecio();
            $precioFuncion += ($precioFuncion * ($objFuncion->getPorcentajeIncremento()) / 100);
            $total += $precioFuncion;
        }

        return $total;
    }

}
