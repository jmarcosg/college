<?php

class Canal
{
    private $tipoCanal;
    private $importe;
    private $esHD;

    public function __construc($tipoCanal, $importe, $esHD)
    {
        $this->tipoCanal = $tipoCanal;
        $this->importe = $importe;
        $this->esHD = $esHD;
    }

    // Observadoras
    public function getTipoCanal()
    {
        return $this->tipoCanal;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function getEsHD()
    {
        return $this->esHD;
    }

    // Modificadoras
    public function setTipoCanal($tipoCanal)
    {
        $this->tipoCanal = $tipoCanal;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setEsHD($esHD)
    {
        $this->esHD = $esHD;
    }

    // Metodos
    public function __toString()
    {
        return "Tipo de canal: " . $this->getTipoCanal() . "\n" .
        "Importe: $" . $this->getImporte() . "\n" .
        "Es HD: " . $this->getEsHD() . "\n";
    }
}
