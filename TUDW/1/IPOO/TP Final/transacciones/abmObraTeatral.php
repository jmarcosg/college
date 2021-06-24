<?php

class abmObraTeatral
{
    public function __construct()
    {}
    /**
     * Crea una nueva funcion de tipo obra teatral
     * @param array $datosFuncion
     * @return boolean $funcionAgregada
     */
    public function agregarFuncion($datosFuncion)
    {
        $nuevaFuncion = new ObraTeatral();
        $nuevaFuncion->cargar($datosFuncion);
        $this->darCosto($nuevaFuncion);

        $funcionAgregada = $nuevaFuncion->insertar();

        return $funcionAgregada;
    }

    /**
     * Recupera una funcion de la BD
     * @param int $idFuncionObraTeatral
     * @return object $funcion
     */
    public function traerFuncion($idFuncionObraTeatral)
    {
        $funcion = new ObraTeatral();
        $funcionEncontrada = $funcion->buscar($idFuncionObraTeatral);

        if (!$funcionEncontrada) {
            $funcion = null;
        }

        return $funcion;
    }

    /**
     * Retorna un string con la informacion de las funciones de tipo obra teatral almacenadas en la bd
     * @return string $datosFuncionObraTeatral
     */
    public function listarFunciones()
    {
        $objFuncionObraTeatral = new ObraTeatral();
        $coleccionFuncionesObraTeatral = $objFuncionObraTeatral->listar();
        $datosFuncionObraTeatral = "";

        foreach ($coleccionFuncionesObraTeatral as $funcion) {
            $datosFuncionObraTeatral .= $funcion . "--------------------------\n";
        }

        return $datosFuncionObraTeatral;
    }

    /**
     * Elimina un funcion de tipo musical de la bd
     * @param int $idFuncionObraTeatral
     * @return boolean $funcionEliminada
     */
    public function eliminarFuncion($idFuncionObraTeatral)
    {
        $obraTeatral = new ObraTeatral();
        $obraTeatral->Buscar($idFuncionObraTeatral);
        $funcionEliminada = $obraTeatral->eliminar();

        return $funcionEliminada;
    }

    /**
     * Calcula el costo de una funcion de tipo musical
     * @param object $objObraTeatral
     */
    public function darCosto($objObraTeatral)
    {
        $costo = $objObraTeatral->getPrecio();
        $costo *= 1.45; // 45% de aumento
        $objObraTeatral->setCostoSala($costo);
    }
}
