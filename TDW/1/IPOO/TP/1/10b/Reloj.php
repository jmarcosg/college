<?php
class Reloj
{

    // Atributos
    private $hh;
    private $mm;
    private $ss;

    // Constructor
    public function __construct($hh, $mm, $ss)
    {
        // int $hh, $mm, $ss
        $this->hh = $hh;
        $this->mm = $mm;
        $this->ss = $ss;
    }

    // Observadoras
    public function getHoras()
    {
        return $this->hh;
    }

    public function getMinutos()
    {
        return $this->mm;
    }

    public function getSegundos()
    {
        return $this->ss;
    }

    // Metodos
    /**
     * Realiza la puesta a cero del cronometro
     */
    public function puestaACero()
    {
        $this->hh = 0;
        $this->mm = 0;
        $this->ss = 0;
    }

    /**
     * Realiza el incremento de valores en el cronometro
     */
    public function incremento()
    {
        if ($this->ss == 59) {
            $this->ss = 0;
            if ($this->mm == 59) {
                $this->mm = 0;
                if ($this->hh == 23) {
                    $this->hh = 0;
                } else {
                    $this->hh++;
                }
            } else {
                $this->mm++;
            }
        } else {
            $this->ss++;
        }
    }

    /**
     * Muestra por pantalla el cronometro
     */
    public function __toString()
    {
        if ($this->hh <= 9) {
            $retorno = "0" . $this->hh . ":";
        } else {
            $retorno = $this->hh . ":";
        }

        if ($this->mm <= 9) {
            $retorno .= "0" . $this->mm . ":";
        } else {
            $retorno .= $this->mm . ":";
        }

        if ($this->ss <= 9) {
            $retorno .= "0" . $this->ss;
        } else {
            $retorno .= $this->ss;
        }
        return $retorno;
    }

}
