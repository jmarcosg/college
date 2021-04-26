<?php
class Item
{
    // Atributos
    private $cantidadVendida;
    private $refProducto;

    // Constructor
    public function __construct($cantidadVendida, $refProducto)
    {
        $this->cantVendida = $cantidadVendida;
        $this->producto = $refProducto;
    }

    // Observadoras
    public function getCantidadVendidaItem()
    {
        return $this->cantVendida;
    }

    public function getReferenciaProducto()
    {
        return $this->producto;
    }

    // Modificadoras
    public function setCantVendida($cantidadVendida)
    {
        $this->cantVendida = $cantidadVendida;
    }

    public function setProducto($refProducto)
    {
        $this->producto = $refProducto;
    }

    // Metodos
    public function __toString()
    {
        return "\tProducto: " . $this->getReferenciaProducto() . "\n" .
        "\tCantidad vendida: " . $this->getCantidadVendidaItem() . "\n";
    }
}
