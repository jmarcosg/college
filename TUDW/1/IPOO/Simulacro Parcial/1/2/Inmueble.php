<?php
class Inmueble
{
    // Atributos
    private $codigoReferencia;
    private $numeroPiso;
    private $tipoInmueble;
    private $costoMensual;
    private $objInquilino;

    // Constrctor
    public function __construct($codigoReferencia, $numeroPiso, $tipoInmueble, $costoMensual, $objInquilino)
    {
        $this->codigo = $codigoReferencia;
        $this->numero = $numeroPiso;
        $this->tipo = $tipoInmueble;
        $this->costo = $costoMensual;
        $this->inquilino = $objInquilino;
    }

    // Observadoras
    public function getCodigoReferencia()
    {
        return $this->codigo;
    }

    public function getNumeroPiso()
    {
        return $this->numero;
    }

    public function getTipoInmueble()
    {
        return $this->tipo;
    }

    public function getCostoMensual()
    {
        return $this->costo;
    }

    public function getObjInquilino()
    {
        return $this->inquilino;
    }

    // Modificadoras
    public function setCodigo($codigoReferencia)
    {
        $this->codigo = $codigoReferencia;
    }

    public function setNumero($numeroPiso)
    {
        $this->numero = $numeroPiso;
    }

    public function setTipo($tipoInmueble)
    {
        $this->tipo = $tipoInmueble;
    }

    public function setCosto($costoMensual)
    {
        $this->costo = $costoMensual;
    }

    public function setInquilino($objInquilino)
    {
        $this->setInquilino = $objInquilino;
    }

    // Metodos
    public function alquilarInmueble($objInquilino)
    {
        if ($this->getObjInquilino() == null) {
            $this->setInquilino($objInquilino);
        }
    }

    public function __toString()
    {
        return "Codigo referencia: " . $this->getCodigoReferencia() . "\n" .
        "Piso: " . $this->getNumeroPiso() . "\n" .
        "Costo mensual: $" . $this->getCostoMensual() . "\n" .
        "Inquilino: \n" . $this->getObjInquilino();
    }
}
