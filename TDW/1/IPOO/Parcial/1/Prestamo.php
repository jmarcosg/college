<?php
class Prestamo
{
    // Atributos
    private $identificacionPrestamo;
    private $fechaOtorgamientoPrestamo;
    private $montoPrestamo;
    private $cantidadCuotasPrestamo;
    private $tazaInteresPrestamo;
    private $coleccionCuotas;
    private $referenciaPersona;

    // Constructor
    public function __construct($identificacionPrestamo, $montoPrestamo, $cantidadCuotasPrestamo, $tazaInteresPrestamo, $referenciaPersona)
    {
        $this->idPrestamo = $identificacionPrestamo;
        //$this->fechaOtorgamiento = $fechaOtorgamientoPrestamo;
        $this->monto = $montoPrestamo;
        $this->cantCuotas = $cantidadCuotasPrestamo;
        $this->tazaInteres = $tazaInteresPrestamo;
        //$this->colCuotas = $coleccionCuotas;
        $this->refPersona = $referenciaPersona;
    }

    // Observadoras
    public function getIdentificacionPrestamo()
    {
        return $this->idPrestamo;
    }

    public function getFechaOtorgamientoPrestamo()
    {
        return $this->fechaOtorgamiento;
    }

    public function getMontoPrestamo()
    {
        return $this->monto;
    }

    public function getCantidadCuotasPrestamo()
    {
        return $this->cantCuotas;
    }

    public function getTazaInteresPrestamo()
    {
        return $this->tazaInteres;
    }

    public function getColeccionCuotas()
    {
        return $this->colCuotas;
    }

    public function getReferenciaPersona()
    {
        return $this->refPersona;
    }

    // Modificadoras
    public function setIdPrestamo($identificacionPrestamo)
    {
        $this->idPrestamo = $identificacionPrestamo;
    }

    public function setFechaOtorgamiento($fechaOtorgamientoPrestamo)
    {
        $this->fechaOtorgamiento = $fechaOtorgamientoPrestamo;
    }

    public function setMonto($montoPrestamo)
    {
        $this->monto = $montoPrestamo;
    }

    public function setCantCuotas($cantidadCuotasPrestamo)
    {
        $this->cantCuotas = $cantidadCuotasPrestamo;
    }

    public function setTazaInteres($tazaInteresPrestamo)
    {
        $this->tazaInteres = $tazaInteresPrestamo;
    }

    public function setColCuotas($coleccionCuotas)
    {
        $this->colCuotas = $coleccionCuotas;
    }

    public function setRefPersona($referenciaPersona)
    {
        $this->refPersona = $referenciaPersona;
    }

    // Metodos
    public function __toString()
    {
        return "\tIdentificacion : " . $this->getIdentificacionPrestamo() . "\n" .
        "\tFecha otorgamiento: " . $this->getFechaOtorgamientoPrestamo() . "\n" .
        "\tMonto: " . $this->getMontoPrestamo() . "\n" .
        "\tCantidad de cuotas: " . $this->getCantidadCuotasPrestamo() . "\n" .
        "\tTaza de interes: " . $this->getTazaInteresPrestamo() . "\n" .
        "\tCuotas: " . $this->getColeccionCuotas() . "\n" .
        "\tSolicitante: " . $this->getReferenciaPersona() . "\n";
    }

    private function calcularInteresPrestamo($numCuota)
    {
        $interesPrestamo = 0;

        if ($numCuota == 1) {
            $interesPrestamo = ($this->getMontoPrestamo() * $this->getTazaInteresPrestamo() / 0.01);
        } else if ($numCuota > 1) {
            $interesPrestamo = ($this->getMontoPrestamo() - (($this->getMontoPrestamo() / $this->getCantidadCuotasPrestamo()) * $numCuota - 1) * $this->getTazaInteresPrestamo() / 0.01);
        }

        return $interesPrestamo;
    }

    public function otorgarPrestamo()
    {
        $fechaHoy = getdate();
        $this->setFechaOtorgamiento($fechaHoy);

        $importeTotalCuota = 0;
        $importeTotalCuota = $this->getMontoPrestamo() / $this->getCantidadCuotasPrestamo();

        $cuotaPagar = darSiguienteCuotaPagar();

        $montoInteres = $this->calcularInteresPrestamo($cuotaPagar > getNumeroCuota());

        $cuota = new Cuota($cuotaPagar, $importeTotalCuota, $montoInteres);
        array_push($coleccionCuotas, $cuota);

    }

    public function darSiguienteCuotaPagar()
    {
        $coleccionCuotas = $this->getColeccionCuotas();

        foreach ($coleccionCuotas as $siguenteCuota) {
            while ($coleccionCuotas->getCuotaCancelada() == false) {
                $referenciaCuota = $siguenteCuota;
            }
        }

        return $referenciaCuota;
    }
}
