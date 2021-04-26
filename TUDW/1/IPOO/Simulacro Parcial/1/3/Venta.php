<?php
class Venta
{
    // Atributos
    private $fechaVenta;
    private $denominacionCliente;
    private $numeroFactura;
    private $tipoComprobante;
    private $coleccionItemsVendidos;

    // Constructor
    public function __construct($fechaVenta, $denominacionCliente, $numeroFactura, $tipoComprobante, $coleccionItemsVendidos)
    {
        $this->fecha = $fechaVenta;
        $this->denomicacion = $denominacionCliente;
        $this->numFactura = $numeroFactura;
        $this->tipoComp = $tipoComprobante;
        $this->colItemsVendidos = $coleccionItemsVendidos;
    }

    // Observadoras
    public function getFechaVenta()
    {
        return $this->fecha;
    }

    public function getDenominacionCliente()
    {
        return $this->denominacion;
    }

    public function getNumeroFactura()
    {
        return $this->numFactura;
    }

    public function getTipoComprobante()
    {
        return $this->tipoComp;
    }

    public function getColeccionItemsVendidos()
    {
        return $this->colItemsVendidos;
    }

    // Modificadoras
    public function setFecha($fechaVenta)
    {
        $this->fecha = $fechaVenta;
    }

    public function setDenominacion($denominacionCliente)
    {
        $this->denominacion = $denominacionCliente;
    }

    public function setNumFactura($numeroFactura)
    {
        $this->numFacura = $numeroFactura;
    }

    public function setTipoComp($tipoComprobante)
    {
        $this->tipoComp = $tipoComprobante;
    }

    public function setColItemsVendidos($coleccionItemsVendidos)
    {
        $this->colItemsVendidos = $coleccionItemsVendidos;
    }

    // Metodos
    public function __toString()
    {
        return "Fecha de venta: " . $this->getFechaVenta() . "\n" .
        "Denominacion del cliente: " . $this->getDenominacionCliente() . "\n" .
        "Numero de factura: " . $this->getNumeroFactura() . "\n" .
        "Tipo de comprobante: " . $this->getTipoComprobante() . "\n" .
        "Items vendidos: \n" . $this->getColeccionItemsVendidos() . "\n";
    }

    public function incorporarProducto($producto, $cantidadAgregarProducto)
    {
        $productoIncorporado = false;

        if (($producto->getCantidadStockProducto() - $cantidadAgregarProducto) >= 0) {
            $colItemsVendidos = $this->getColeccionItemsVendidos();
            $producto->actualizarStock($cantidadAgregarProducto);
            $nuevoObjItem = new Item($cantidadAgregarProducto, $producto);
            array_push($colItemsVendidos, $nuevoObjItem);
            $this->setColItemsVendidos($coleccionItemsVendidos);
            $productoIncorporado = true;
        }

        return $productoIncorporado;
    }

}
