<?php

class Oficina extends Contrato
{
    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRenueva, $objCliente)
    {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRenueva, $objCliente);
    }
}
