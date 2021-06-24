<?php

class abmTeatro
{
    public function __construct()
    {}
    /**
     * Crea una nueva funcion de tipo obra teatral
     * @param string $nombre, $direccion, $ciudad
     * @return boolean $teatroAgregado
     */
    public function agregarTeatro($nombre, $direccion, $ciudad)
    {
        $teatroAgregado = false;
        $teatro = new Teatro();
        $teatro->cargar($nombre, $direccion, $ciudad);

        if ($teatro->insertar()) {
            $teatroAgregado = true;
        }

        return $teatroAgregado;
    }

    /**
     * Recupera un teatro de la BD a partir del id recibido
     * @param int $id
     * @return object $teatroEncontrado
     */
    public function traerTeatro($id)
    {
        $teatro = new Teatro();
        $teatroEncontrado = $teatro->buscar($id);
        $teatro->getColeccionFunciones();

        if (!$teatroEncontrado) {
            $teatro = null;
        }

        return $teatro;
    }

    /**
     * Modifica el nombre de un teatro
     * @param object $objTeatro
     * @param string $nombreNuevo
     * @return boolean $nombreModificado
     */
    public function modificarNombre($objTeatro, $nombreNuevo)
    {
        $objTeatro->setNombre($nombreNuevo);
        $nombreModificado = $objTeatro->modificar();

        return $nombreModificado;
    }

    /**
     * Modifica la direccion de un teatro
     * @param object $objTeatro
     * @param string $direccionNueva
     * @return boolean $direccionModificada
     */
    public function modificarDireccion($objTeatro, $direccionNueva)
    {
        $objTeatro->setDireccion($direccionNueva);
        $direccionModificada = $objTeatro->modificar();

        return $direccionModificada;
    }

    /**
     * Modifica la ciudad de un teatro
     * @param object $objTeatro
     * @param string $ciudadNueva
     * @return boolean $ciudadModificada
     */
    public function modificarCiudad($objTeatro, $ciudadNueva)
    {
        $objTeatro->setCiudad($ciudadNueva);
        $ciudadModificada = $objTeatro->modificar();

        return $ciudadModificada;
    }

    /**
     * Retorna un string con la informacion de las funciones de tipo obra teatral almacenadas en la bd
     * @return string $datosTeatros
     */
    public function listarTeatros()
    {
        $objTeatro = new Teatro();
        $coleccionTeatros = $objTeatro->listar();
        $datosTeatros = "Teatros: \n";

        foreach ($coleccionTeatros as $teatro) {
            $datosTeatros .= $teatro . "\n";
        }

        return $datosTeatros;
    }

    /**
     * Elimina un teatro de la bd
     * @param object $objTeatro
     * @return boolean $teatroEliminado
     */
    public function eliminarTeatro($objTeatro)
    {
        $teatroEliminado = $objTeatro->eliminar();

        return $teatroEliminado;
    }

    /**
     * Agrega una nueva funcion a la bd
     * @param array $datosFuncion
     * @return boolean $funcionAgregada
     */
    public function cargarFuncion($datosFuncion)
    {
        $funcionAgregada = false;
        $tipoFuncion = strtolower($datosFuncion["tipo_funcion"]);

        $funcionNoSeSolapa = $this->verificarSolapamiento($datosFuncion["fecha"], $datosFuncion["horario_inicio"], $datosFuncion["duracion"], $datosFuncion["teatro"]);

        if ($funcionNoSeSolapa) {
            if ($tipoFuncion == "cine") {
                $abm = new abmCine();
            } else if ($tipoFuncion == "musical") {
                $abm = new abmMusical();
            } else if ($tipoFuncion == "obra") {
                $abm = new abmObraTeatral();
            }
            $funcionAgregada = $abm->agregarFuncion($datosFuncion);
        }

        return $funcionAgregada;
    }

    /**
     * Verifica que el horario de una funcion no se solape con otra en una misma fecha y hora
     * @param int $horaInicioFuncionNueva
     * @param int $duracionFuncionNueva
     * @param string $fechaFuncionNueva
     * @param object $objTeatro
     * @return boolean $seSolapa
     */
    public function verificarSolapamiento($fechaFuncionNueva, $horaInicioFuncionNueva, $duracionFuncionNueva, $objTeatro)
    {
        $teatro = new Teatro();
        $teatro = $objTeatro;
        $seSolapa = true;
        $finFuncionNueva = $horaInicioFuncionNueva + $duracionFuncionNueva;
        $coleccionFunciones = $teatro->getColeccionFunciones();
        $i = 0;

        while ($seSolapa && $i < count($coleccionFunciones)) {
            $horaInicioFuncionExistente = $coleccionFunciones[$i]->getHorarioInicio();
            $finFuncionExistente = $horaInicioFuncionExistente + $coleccionFunciones[$i]->getDuracion();
            $fechaFuncionExistente = $coleccionFunciones[$i]->getFecha();

            // OBS: agradeceria saber el porque de cuando quiero verificar con la fecha SIEMPRE me da como que NO se solapa y me deja cargar la funcion
            // if ($fechaFuncionNueva == $fechaFuncionExistente) {
            if (($horaInicioFuncionNueva >= $horaInicioFuncionExistente && $horaInicioFuncionNueva <= $finFuncionExistente) || ($finFuncionNueva >= $horaInicioFuncionExistente && $finFuncionNueva <= $finFuncionExistente)) {
                echo "se deberia solapar\n";
                $seSolapa = false;
            }
            //}
            $i++;
        }

        return $seSolapa;
    }

    /**
     * Calcula el costo total para un mes del teatro
     * Se calcula sumando los totales de cada uno de los tipos funciones
     * @param object $objTeatro
     * @param int $mes
     * @return float $costo
     */
    public function darCostoTeatro($objTeatro, $mes)
    {
        $costo = 0;

        foreach ($objTeatro->getColeccionFunciones() as $funcion) {
            $fechaEntero = strtotime($funcion->getfecha()); //strtotime convierte una fecha en formato yyyy/mm/dd a una fecha completa. Ej 2012-01-01 -> 1st Janaury 2012
            $mesFuncion = date('m', $fechaEntero); // Me quedo solo con el mes de la fecha

            if ($mes == $mesFuncion) {
                $costo += $funcion->getCostoSala();
            }
        }

        return $costo;
    }

}
