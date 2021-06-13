<?php

class EmpresaCable
{
    private $colPlanes;
    private $colContratos;

    public function __contruct($colPlanes, $colContratos)
    {
        $this->colPlanes = $colPlanes;
        $this->colContratos = $colContratos;
    }

    // Observadoras
    public function getColPlanes()
    {
        return $this->colPlanes;
    }

    public function getColContratos()
    {
        return $this->colContratos;
    }

    // Modificadoras
    public function setColPlanes($colPlanes)
    {
        $this->colPlanes = $colPlanes;
    }

    public function setColContratos($colContratos)
    {
        $this->colContratos = $colContratos;
    }

    // Metodos
    public function __toString()
    {
        return "Planes: " . $this->mostrarColeccion($this->getColPlanes()) . "\n" .
        "Contratos: " . $this->mostrarColeccion($this->getColContratos()) . "\n";
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

    public function incorporarPlan($objPlanNuevo)
    {
        $coleccionPlanes = $this->getColPlanes();
        $planExistente = $this->verificarExistenciaPlan($objPlanNuevo, $coleccionPlanes);

        if ($planExistente) {
            array_push($coleccionPlanes, $plan);
            $this->setColPlanes($coleccionPlanes);
        }

    }

    public function verificarExistenciaPlan($planNuevo, $coleccionPlanesExistente)
    {
        $mgPlanNuevo = $planNuevo->getInclyeMG();
        $existe = true;
        $i = 0;

        // Recorro la coleccion de planes
        while ($i < count($coleccionPlanesExistente) && $existe) {
            $j = 0;
            $coleccionCanalesExistente = $coleccionPlanes[$j]->getColeccionCanales();
            $coleccionCanalesPlanNuevo = $objPlan->getColeccionCanales();

            // Recorro la coleccion ya existente de canales de cada uno de los planes guardados y los comparo con los del plan nuevo
            while ($j < count($coleccionCanalesExistente) && $j < count($coleccionCanalesPlanNuevo) && $existe) {
                if ($coleccionCanalesExistente[$j] == $coleccionCanalesPlanNuevo[$j]) {
                    $k = 0;
                    $existe = false;

                    // Recorro verificando que no haya un mismo plan con la misma cantidad de MG ya existente si es que la cant de MG > 0
                    if ($mgPlanNuevo > 0) {
                        while ($k < count($coleccionPlanesExistente) && $existe) {
                            if ($coleccionPlanesExistente[$k]->getIncluyeMG() == $mgPlanNuevo) {
                                $existe = false;
                            }
                            $k++;
                        }
                    }
                }
                $j++;
            }
            $i++;
        }

        return $existe;
    }

    public function incorporarContrato($planNuevo, $objCliente, $fechaInicio, $fechaVencimiento, $contratoWeb)
    {
        $coleccionContratos = $this->getColContratos();

        if ($contratoWeb) {
            $nuevoContrato = new Web($fechaInicio, $fechaVencimiento, $objPlan, "Al dia", 0, true, $objCliente);
        } else {
            $nuevoContrato = new Oficina($fechaInicio, $fechaVencimiento, $objPlan, "Al dia", 0, true, $objCliente);
        }

        array_push($coleccionContratos, $nuevoContrato);
        $this->setColContratos($coleccionContratos);
    }

    public function retornarImporteContratos($codigoPlan)
    {
        $sumaImportes = 0;
        $coleccionContratos = $this->getColContratos();

        for ($i = 0; $i < count($coleccionContratos); $i++) {
            $planEnColeccion = $coleccionContratos[$i]->getObjPlan();
            $codigoPlanEnColeccion = $planEnColeccion->getCodigo();

            if ($codigoPlanEnColeccion == $codigoPlan) {
                $sumaImportes += $coleccionContratos[$i]->calcularImporte();
            }
        }

        return $sumaImportes;
    }

    public function pagarContrato($objContrato)
    {
        $objContrato->actualizarEstadoContrato();
        $importe = $objContrato->calcularImporte();

        return $importe;
    }

}
