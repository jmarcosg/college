<?php
class Producto
{
    // Atributos
    private $codigoBarra;
    private $nombreProducto;
    private $marcaProducto;
    private $colorProducto;
    private $talleProducto;
    private $descripcionProducto;
    private $cantidadStock;

    // Constructor
    public function __construct($codigoBarra, $nombreProducto, $marcaProducto, $colorProducto, $talleProducto, $descripcionProducto, $cantidadStock)
    {
        $this->codigo = $codigoBarra;
        $this->nombre = $nombreProducto;
        $this->marca = $marcaProducto;
        $this->color = $colorProducto;
        $this->talle = $talleProducto;
        $this->descripcion = $descripcionProducto;
        $this->stock = $cantidadStock;
    }

    // Observadoras
    public function getCodigoBarraProducto()
    {
        return $this->codigo;
    }

    public function getNombreProducto()
    {
        return $this->nombre;
    }

    public function getMarcaProducto()
    {
        return $this->marca;
    }

    public function getColorProducto()
    {
        return $this->color;
    }

    public function getTalleProducto()
    {
        return $this->talle;
    }

    public function getDescripcionProducto()
    {
        return $this->descripcion;
    }

    public function getCantidadStockProducto()
    {
        return $this->stock;
    }

    // Modificadoras
    public function setCodigo($codigoBarra)
    {
        $this->codigo = $codigoBarra;
    }

    public function setNombre($nombreProducto)
    {
        $this->nombre = $nombreProducto;
    }

    public function setMarca($marcaProducto)
    {
        $this->marca = $marcaProducto;
    }

    public function setColor($colorProducto)
    {
        $this->color = $colorProducto;
    }

    public function setTalle($talleProducto)
    {
        $this->talle = $talleProducto;
    }

    public function setDescripcion($descripcionProducto)
    {
        $this->decripcion = $descripcionProducto;
    }

    public function setStock($cantidadStock)
    {
        $this->stock = $cantidadStock;
    }

    // Metodos
    public function __toString()
    {
        return "\tCodigo barra: " . $this->getCodigoBarraProducto() . "\n" .
        "\t\tNombre: " . $this->getNombreProducto() . "\n" .
        "\t\tMarca: " . $this->getMarcaProducto() . "\n" .
        "\t\tColor: " . $this->getColorProducto() . "\n" .
        "\t\tTalle: " . $this->getTalleProducto() . "\n" .
        "\t\tDescripcion: " . $this->getDescripcionProducto() . "\n" .
        "\t\tCantidad en stock: " . $this->getCantidadStockProducto() . "\n";
    }

    public function actualizarStock($cantidadProductos)
    {
        if ($cantidadProductos > 0) {
            $total = $this->getCantidadStockProducto() + $cantidadProductos;
            $this->setStock($total);
        } else {
            $total = $this->getCantidadStockProducto() - $cantidadProductos;
            $this->setStock($total);
        }
    }
}
