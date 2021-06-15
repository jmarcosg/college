<?php

class Plan
{
    private $codigo;
    private $canales;
    private $importe;
    private $incluyeMG;

    public function __construct($codigo, $canales, $importe)
    {
        $this->codigo = $codigo;
        $this->canales = $canales;
        $this->importe = $importe;
        $this->incluyeMG = 50;
    }

    // Observadoras
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCanales()
    {
        return $this->canales;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function getIncluyeMG()
    {
        return $this->incluyeMG;
    }

    // Modificadoras
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setCanales($canales)
    {
        $this->canales = $canales;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setIncluyeMG($incluyeMG)
    {
        $this->incluyeMG = $incluyeMG;
    }

    // Metodos
    public function __toString()
    {
        return "Canales: " . $this->mostrarColeccion($this->getCanales()) . "\n" .
        "Codigo plan: " . $this->getCodigo() . "\n" .
        "Importe: $" . $this->getImporte() . "\n" .
        "Cantidad MG incluidos: " . $this->getIncluyeMG() . "\n";

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
}
