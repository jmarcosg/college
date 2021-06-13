<?php

class Contrato
{
    private $fechaInicio;
    private $fechaVencimiento;
    private $objPlan;
    private $estado;
    private $costo;
    private $seRenueva;
    private $objCliente;

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRenueva, $objCliente)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->objPlan = $objPlan;
        $this->estado = $estado;
        $this->costo = $costo;
        $this->seRenueva = $seRenueva;
        $this->objCliente = $objCliente;
    }

    // Observadoras
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    public function getObjPlan()
    {
        return $this->objPlan;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function getSeRenueva()
    {
        return $this->seRenueva;
    }

    public function getObjCliente()
    {
        return $this->objCliente;
    }

    // Modificadoras
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setObjPlan($objPlan)
    {
        $this->objPlan = $objPlan;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function setSeRenueva($seRenueva)
    {
        $this->seRenueva = $seRenueva;
    }

    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    // Metodos
    public function __toString()
    {
        return "Fecha inicio: " . $this->getFechaInicio() . "\n" .
        "Fecha vencimiento: " . $this->getFechaVencimiento() . "\n" .
        "Plan: " . $this->getObjPlan() . "\n" .
        "\tEstado: " . $this->getEstado() . "\n" .
        "\tCosto: $" . $this->getCosto() . "\n" .
        "\tSe renueva: " . $this->seRenueva() . "\n" .
        "Cliente: " . $this->getObjCliente() . "\n";
    }

    public function actualizarEstadoContrato()
    {
        $estadoMoroso = "Moroso";
        $estadoSuspendido = "Suspendido";
        $estadoAlDia = "Al día";
        $diasVencido = $this->diasContratoVencido();

        if ($diasVencido >= 1 && $diasVencido < 10) {
            $this->setEstado($estadoMoroso);
        } else if ($diasVencido >= 10) {
            $this->setEstado($estadoSuspendido);
            $this->setSeRenueva(false);
        } else {
            $this->setEstado($estadoAlDia);
        }
    }

    public function diasContratoVencido()
    {
        $fechaVencimiento = $this->getFechaVencimiento();
        $fechaActual = date("Y-m-d");
        $cantidadDiasVencido = 0;

        /**
         * Para calcular la diferencia entre fechas primero saco la diferencia absoluta entre ambas
         * Luego, los años de diferencia
         * Luego, los meses de diferencia
         * Y por ultimo, los dias de diferencia
         */
        $diferenciaEntreFechas = abs($fechaActual - $fechaVencimiento);
        $anios = floor($diferenciaEntreFechas / (365 * 60 * 60 * 24));
        $meses = floor(($diferenciaEntreFechas - $anios * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $dias = floor(($diferenciaEntreFechas - $anios * 365 * 60 * 60 * 24 - $meses * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $cantidadDiasVencido = $dias;

        return $cantidadDiasVencido;
    }

    public function calcularImporte()
    {
        $objPlan = $this->getPlan();
        $importeFinal = $objPlan->getImporte();
        $coleccionCanales = $objPlan->getColeccionCanales();
        $diasVencido = $this->actualizarEstadoContrato();

        // Importe por canal
        foreach ($coleccionCanales as $objCanal) {
            $importeFinal += $objCanal->getImporte();
        }

        // Calculo el importe final dependiendo el estado del cliente con el contrato
        /**
         * Si el contrato está en estado moroso, se cobrará una multa que sera un incremento del 10% del valor pactado por la cantidad de días en mora, además su estado se actualizará al valor al día y se renovará.
         * Finalmente si el estado del contrato es suspendido se cobrará la misma multa de un contrato moroso pero no se permitirá su renovación
         */
        if ($this->getEstado() == "Moroso") {
            $importeFinal += $importeFinal * 0.1 * $diasVencido;
        } else if ($this->getEstado == "Suspendido") {
            $importeFinal += $importeFinal * 0.1 * 10;
        }
        return $importeFinal;
    }
}
