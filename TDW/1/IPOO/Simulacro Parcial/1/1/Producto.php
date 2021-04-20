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
    private $codigoProducto;
    private $costoProducto;
    private $anioFabricacion;
    private $descripcionProdcuto;
    private $incrementoAnual;
    private $productoDisponible;

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

    public function getProductoDisponible()
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
    /**
     * Calcula el valor por el cual puede ser vendido el producto.
     * Si el producto no se encuentra disponible para la venta retorna -1
     * Si el producto esta disponible para la venta, devuelve el valor
     */
    public function darPrecioVenta()
    {
        /**
         * Declaracion de variables
         * float $valorFinalProducto, $costo, $incremento
         * int $anio
         */

        if ($this->getProductoDisponible()) {
            $costo = $this->getCostoProducto();
            $anio = date('Y') - $this->getAnioFabricacion();
            $incremento = $this->getIncrementoAnual();
            $valorFinalProducto = $costo + ($costo * $anio * ($incremento / 100));
        } else {
            $valorFinalProducto = -1;
        }

        return $valorFinalProducto;
    }

    public function __toString()
    {
        return "Codigo: " . $this->getCodigoProducto() . "\n" .
        "Costo: $" . $this->getCostoProducto() . "\n";
        "Año de fabricacion: " . $this->getAnioFabricacion() . "\n" .
        "Descripcion: " . $this->getDescripcionProducto() . "\n" .
        "Incremento anual: " . $this->getIncrementoAnual() . "$\n" .
        "Activo: " . $this->getProductoDisponible();
    }
}
