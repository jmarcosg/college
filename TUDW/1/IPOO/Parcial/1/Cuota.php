<?php
class Cuota
{
    // Atributos
    private $numeroCuota;
    private $montoCuota;
    private $montoInteresCuota;
    private $cuotaCancelada;

    // Constructor
    public function __construct($numeroCuota, $montoCuota, $montoInteresCuota)
    {
        $this->numCuota = $numeroCuota;
        $this->monto = $montoCuota;
        $this->montoInteres = $montoInteresCuota;
        $this->cancelada = false;
    }

    // Observadoras
    public function getNumeroCuota()
    {
        return $this->numCuota;
    }

    public function getMontoCuota()
    {
        return $this->monto;
    }

    public function getMontoInteresCuota()
    {
        return $this->montoInteres;
    }

    public function getCuotaCancelada()
    {
        return $this->cancelada;
    }

    // Modificadoras
    public function setNumCuota($numeroCuota)
    {
        $this->numCuota = $numeroCuota;
    }

    public function setMonto($montoCuota)
    {
        $this->monto = $montoCuota;
    }

    public function setMontoInteres($montoInteresCuota)
    {
        $this->montoInteres = $montoInteresCuota;
    }

    public function setCancelada($cuotaCancelada)
    {
        $this->cancelada = $cuotaCancelada;
    }

    // Metodos
    public function __toString()
    {
        return "\tNumero cuota : " . $this->getNumeroCuota() . "\n" .
        "\tMonto: " . $this->getMontoCuota() . "\n" .
        "\tMonto interes: " . $this->getMontoInteresCuota() . "\n" .
        "\tCancelada: " . $this->getCuotaCancelada() . "\n";
    }

    public function darMontoFinalCuota()
    {
        $montoFinal = 0;

        $montoFinal = $this->getMontoCuota() + $this->getMontoInteresCuota();

        return $montoFinal;
    }
}
