<?php
class Producto
{
    /**
     * Atributos
     * int $codigoProducto, $anioFabricacion
     * float $costoProducto, $incrementoAnual
     * string $descripcionProdcuto
     * boolean $productoDisponible
     */

    // Constructor
    public function __construct($codigoProducto, $costoProducto, $anioFabricacion, $descripcionProdcuto, $incrementoAnual, $productoDisponible)
    {
        $this->codigo = $codigoProducto;
        $this->costo = $costoProducto;
        $this->aFabric = $anioFabricacion;
        $this->descripcion = $descripcionProdcuto;
        $this->incremento = $incrementoAnual;
        $this->disponible = $productoDisponible;
    }

    // Observadoras
    public function getCodigoProducto()
    {
        return $this->codigo;
    }

    public function getCostoProducto()
    {
        return $this->costo;
    }

    public function getAnioFabricacion()
    {
        return $this->aFabric;
    }

    public function getDescripcionProducto()
    {
        return $this->descripcion;
    }

    public function getIncrementoAnual()
    {
        return $this->incremento;
    }

    public function getProductoDiscponible()
    {
        return $this->disponible;
    }

    // Modificadoras
    public function setCodigo($codigoProducto)
    {
        $this->codigo = $codigoProducto;
    }

    public function setCosto($costoProducto)
    {
        $this->costo = $costoProducto;
    }

    public function setAFabric($anioFabricacion)
    {
        $this->aFabric = $anioFabricacion;
    }

    public function setDescripcion($descripcionProdcuto)
    {
        $this->descripcion = $descripcionProdcuto;
    }

    public function setIncremento($incrementoAnual)
    {
        $this->incremento = $incrementoAnual;
    }

    public function setDisponible($productoDisponible)
    {
        $this->disponible = $productoDisponible;
    }

    // Metodos

}
