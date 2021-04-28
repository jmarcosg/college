<?php
class Fecha
{
    // Atributos
    private $dd;
    private $mm;
    private $aaaa;

    // Constructor
    public function __construct($dd, $mm, $aaaa)
    {
        // int $dd, $mm, $aaaa
        $this->dd = $dd;
        $this->mm = $mm;
        $this->aaaa = $aaaa;
        $this->numeroMes = array(
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre");
    }

    // Observadoras
    public function getDia()
    {
        return $this->dd;
    }

    public function getMes()
    {
        return $this->mm;
    }

    public function getAnio()
    {
        return $this->aaaa;
    }

    public function setDia($dd)
    {
        $this->dd = $dd;
    }

    public function setMes($mm)
    {
        $this->mm = $mm;
    }

    public function setAnio($aaaa)
    {
        $this->aaaa = $aaaa;
    }

    // Metodos
    /**
     * Verificacion de si un año es bisiesto
     */
    public function verificarBisiesto()
    {
        /** Declaracion de variables
         * boolean $anioBisiesto
         */

        // Inicializacion de variables
        $anio = $this->getAnio();
        $anioBisiesto = false;

        if ($anio % 4 == 0 && $anio % 100 != 0) {
            $anioBisiesto = true;
        } elseif ($anio % 400 == 0) {
            $anioBisiesto = true;
        }
        return $anioBisiesto;
    }

    /**
     * Suma dias a los meses de 31 dias de duracion
     */
    private function sumarDiasA31($dd)
    {
        if (($this->getDia() + $dd) > 31) {
            $this->incrementarMes(1);
            $this->setDia(1);
        } else {
            $incrementoDia = $this->getDia() + $dd;
            $this->setDia($incrementoDia);
        }
    }

    /**
     * Suma dias a los meses de 30 dias de duracion
     */
    private function sumarDiasA30($dd)
    {
        if (($this->getDia() + $dd) > 30) {
            $this->incrementarMes(1);
            $this->setDia(1);
        } else {
            $incrementoDia = $this->getDia() + $dd;
            $this->setDia($incrementoDia);
        }
    }

    /**
     * Suma dias al mes de Febrero con condicion de si es un año bisiesto
     */
    private function sumarDiasAFebrero($dd)
    {
        if ($this->verificarBisiesto()) {
            if (($this->getDia() + $dd) > 29) {
                $this->incrementarMes(1);
                $this->setDia(1);
            } else {
                $incrementoDia = $this->getDia() + $dd;
                $this->setDia($incrementoDia);
            }
        } else {
            if (($this->getDia() + $dd) > 28) {
                $this->incrementarMes(1);
                $this->setDia(1);
            } else {
                $incrementoDia = $this->getDia() + $dd;
                $this->setDia($incrementoDia);
            }
        }
    }

    /**
     * Incrementa en 1 el valor del dia de una fecha ingresada
     */
    public function incrementarDia($n)
    {
        $mesActual = $this->getMes();
        for ($i = 0; $i < $n; $i++) {
            if ($mesActual == 1 || $mesActual == 3 || $mesActual == 5 || $mesActual == 7 || $mesActual == 8 || $mesActual == 10 || $mesActual == 12) {
                $this->sumarDiasA31(1);
            } elseif ($mesActual == 4 || $mesActual == 6 || $mesActual == 9 || $mesActual == 11) {
                $this->sumarDiasA30(1);
            } else {
                $this->sumarDiasAFebrero(1);
            }
        }
    }

    /**
     * Incrementa en 1 el valor del mes de una fecha ingresada
     */
    public function incrementarMes($mm)
    {
        if (($this->getMes() + $mm) > 12) {
            $this->incrementarAnio(1);
            $incrementoMes = 1;
            $this->setMes($incrementoMes);
        } else {
            $incrementoMes = $this->getMes() + $mm;
            $this->setMes($incrementoMes);
        }
    }

    /**
     * Incrementa en 1 el valor del año de una fecha ingresada
     */
    public function incrementarAnio($anio)
    {
        $incrementoAnio = $this->getAnio() + $anio;
        $this->setAnio($incrementoAnio);
    }

    /**
     * Muestra por pantalla la fecha ingresada de forma extendida
     */
    public function mostrarFechaExtendida()
    {
        /**
         * Declaracion de variables
         * string $cadena
         */
        $salida = $this->getDia() . " de " . $this->numeroMes[($this->getMes())] . " de " . $this->getAnio() . "\n ";
        return $salida;

    }

    /**
     * Muestra por pantalla la fecha ingresada de forma extendida
     */
    public function __toString()
    {
        /**
         * Declaracion de variables
         * string $salida
         */
        $salida = "";

        if (($this->getDia() / 10) < 1) {
            $salida = "0" . $this->getDia();
        } else {
            $salida = $this->getDia();
        }
        if (($this->getMes() / 10) < 1) {
            $salida = $salida . "/0" . $this->getMes();
        } else {
            $salida = $salida . "/" . $this->mm;
        }
        if (($this->getAnio() / 10) < 1) {
            $salida = $salida . "/0" . $this->getAnio() . "\n";
        } else {
            $salida = $salida . "/" . $this->getAnio() . "\n";
        }
        return $salida;
    }

}
