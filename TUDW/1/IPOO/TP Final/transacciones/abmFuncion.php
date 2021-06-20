
<?php
class abmFuncion
{
    /**
     * Crea una nueva funcion
     * @param array $datosFuncion
     * @return boolean $funcionAgregada
     */
    public function agregarFuncion($datosFuncion)
    {
        $funcion = new Funcion();
        $funcionAgregada = false;
        $funcion->cargar($datosFuncion);
        $this->darCosto($funcion);

        if ($funcion->insertar()) {
            $funcionAgregada = true;
        }
        return $funcionAgregada;
    }

    /**
     * Trae una funcion de la BD a partir del id recibido
     * @param int $id
     * @return object $funcionEncontrada
     */
    public function traerFuncion($id)
    {
        $funcion = new Funcion();
        $funcionEncontrada = $funcion->buscar($id);

        if (!$funcionEncontrada) {
            $funcion = null;
        }

        return $funcionEncontrada;
    }

    /**
     * Retorna un string con la informacion de las funciones almacenadas en la bd
     * @return string $datosFuncion
     */
    public function listarFunciones()
    {
        $objFuncion = new Funcion();
        $coleccionFunciones = $objFuncion->listar();
        $datosFuncion = "Funciones: \n";

        foreach ($coleccionFunciones as $funcion) {
            $datosFuncion .= "ID: " . $funcion->getIdFuncion() . " " . "Nombre: " . $funcion->getNombre() . " "
            . "Precio $" . $funcion->getPrecio() . " idTeatro: " . $funcion->getObjTeatro()->getIdTeatro() . "\n";
        }

        return $datosFuncion;
    }

    /**
     * Modifica el nombre de una funcion
     * @param object $objFuncion
     * @param string $nuevoNombre
     * @return boolean nombreModificado
     */
    public function modificarNombre($objFuncion, $nuevoNombre)
    {
        $objFuncion->setNombre($nuevoNombre);
        $nombreModificado = $objFuncion->modificar();

        return $nombreModificado;
    }

    /**
     * Modifica el precio de una funcion
     * @param object $objFuncion
     * @param float $precioNuevo
     * @return boolean $precioModificado
     */
    public function modificarPrecio($objFuncion, $precioNuevo)
    {
        $objFuncion->setPrecio($precioNuevo);
        $precioModificado = $objFuncion->modificar();

        return $precioModificado;
    }

    /**
     * Elimina una funcion de la bd
     * @param object $objFuncion
     * @return boolean $funcionEliminada
     */
    public function eliminarFuncion($objFuncion)
    {
        $funcionEliminada = $objFuncion->eliminar();

        return $funcionEliminada;
    }

    /**
     * Calcula el costo de la funcion
     * @return float $costo
     */
    public function darCosto($objFuncion)
    {
        $costo = $objFuncion->getPrecio();

        return $costo;
    }
}