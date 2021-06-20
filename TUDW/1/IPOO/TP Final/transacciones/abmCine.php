<?php

class abmCine
{
    /**
     * Crea una nueva funcion de tipo cine
     * @param array $datosFuncion
     * @return boolean $funcionAgregada
     */
    public function agregarFuncion($datosFuncion)
    {
        $nuevaFuncion = new Cine();
        $funcionAgregada = false;
        $nuevaFuncion->cargar($datosFuncion);
        $this->darCosto($nuevaFuncion);

        if ($nuevaFuncion->insertar()) {
            $funcionAgregada = true;
        }

        return $funcionAgregada;
    }

    /**
     * Recupera una funcion de la BD
     * @param int $idFuncionCine
     * @return object $funcion
     */
    public function traerFuncion($idFuncionCine)
    {
        $funcion = new Cine();
        $funcionEncontrada = $funcion->buscar($idFuncionCine);

        if (!$funcionEncontrada) {
            $funcion = null;
        }

        return $funcion;
    }

    /**
     * Retorna un string con la informacion de las funciones de tipo cine almacenadas en la bd
     * @return string $datosFuncionCine
     */
    public function listarFunciones()
    {
        $objFuncionCine = new Cine();
        $coleccionFuncionesCine = $objFuncionCine->listar();
        $datosFuncionCine = "";

        foreach ($coleccionFuncionesCine as $funcion) {
            $datosFuncionCine .= $funcion . "--------------------------\n";
        }

        return $datosFuncionCine;
    }

    /**
     * Elimina un funcion de tipo cine de la bd
     * @param int $idFuncionCine
     * @return boolean $funcionEliminada
     */
    public function eliminarFuncion($idFuncionCine)
    {
        $cine = new Cine();
        $cine->Buscar($idFuncionCine);
        $funcionEliminada = $cine->eliminar();

        return $funcionEliminada;
    }

    /**
     * Calcula el costo de una funcion de tipo cine
     * @param object $objCine
     */
    public function darCosto($objCine)
    {
        $costo = $objCine->getPrecio();
        $costo *= 1.65; // 65% de aumento
        $objCine->setCostoSala($costo);
    }
}
