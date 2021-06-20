<?php

class abmMusical
{
    /**
     * Crea una nueva funcion de tipo musical
     * @param array $datosFuncion
     * @return boolean $funcionAgregada
     */
    public function agregarFuncion($datosFuncion)
    {
        $nuevaFuncion = new Musical();
        $funcionAgregada = false;
        $nuevaFuncion->cargar($datosFuncion);
        $this->darCosto($nuevaFuncion);

        if ($cine->insertar()) {
            $funcionAgregada = true;
        }

        return $funcionAgregada;
    }

    /**
     * Recupera una funcion de la BD
     * @param int $idFuncionMusical
     * @return object $funcion
     */
    public function traerFuncion($idFuncionMusical)
    {
        $funcion = new Musical();
        $funcionEncontrada = $funcion->buscar($idFuncionMusical);

        if (!$funcionEncontrada) {
            $funcion = null;
        }

        return $funcion;
    }

    /**
     * Retorna un string con la informacion de las funciones de tipo musical almacenadas en la bd
     * @return string $datosFuncionMusical
     */
    public function listarFunciones()
    {
        $objFuncionMusical = new Musical();
        $coleccionFuncionesMusical = $objFuncionMusical->listar();
        $datosFuncionMusical = "";

        foreach ($coleccionFuncionesMusical as $funcion) {
            $datosFuncionMusical .= $funcion . "--------------------------\n";
        }

        return $datosFuncionMusical;
    }

    /**
     * Elimina un funcion de tipo musical de la bd
     * @param int $idFuncionMusical
     * @return boolean $funcionEliminada
     */
    public function eliminarFuncion($idFuncionMusical)
    {
        $musical = new Musical();
        $musical->Buscar($idFuncionMusical);
        $funcionEliminada = $musical->eliminar();

        return $funcionEliminada;
    }

    /**
     * Calcula el costo de una funcion de tipo musical
     * @param object $objMusical
     */
    public function darCosto($objMusical)
    {
        $costo = $objMusical->getPrecio();
        $costo *= 1.12; // 12% de aumento
        $objMusical->setCostoSala($costo);
    }
}
