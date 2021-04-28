<?php
class Venta
{
    /**
     * Atributos
     * int $numeroVenta
     * float $precioFinal;
     * string $fechaVenta
     * obj $Cliente, $coleccionProductos
     */
    private $numeroVenta;
    private $fechaVenta;
    private $Cliente;
    private $coleccionProductos;
    private $precioFinal;

    // Cosntructor
    public function __construct($numeroVenta, $fechaVenta, $Cliente)
    {
        $this->numero = $numeroVenta;
        $this->fecha = $fechaVenta;
        $this->cliente = $Cliente;
        $this->colProds = [];
        $this->precioFinal = 0;
    }

    // Observadoras
    public function getNumeroVenta()
    {
        return $this->numero;
    }

    public function getFechaVenta()
    {
        return $this->fecha;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getColeccionProductos()
    {
        return $this->colProds;
    }

    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    // Modificadoras
    public function setNumero($numeroVenta)
    {
        $this->numero = $numeroVenta;
    }

    public function setFecha($fechaVenta)
    {
        $this->fecha = $fechaVenta;
    }

    public function setCliente($Cliente)
    {
        $this->cliente = $Cliente;
    }

    public function setColProds($coleccionProductos)
    {
        $this->colProds = $coleccionProductos;
    }

    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }

    // Metodos
    public function incorporarProducto($objNuevoProducto)
    {
        /**
         * Declaracion de variables
         * array $productos
         * float $precioFinal
         */
        $productos = $this->getColeccionProductos();
        $precioFinal = $this->getPrecioFinal();

        if ($objNuevoProducto->getProductoDisponible()) {
            $productos[count($productos)] = $objNuevoProducto;
            $this->setColProds($productos);
            $precioFinal += $objNuevoProducto->darPrecioVenta();
            $this->setPrecioFinal($precioFinal);
        }
    }

    public function __toString()
    {
        return "Numero venta: " . $this->getNumeroVenta() . "\n" .
        "Fecha: " . $this->getFechaVenta() . "\n" .
        "Cliente: " . $this->getCliente() . "\n" .
        "Productos: \n" . $this->mostrarProductos() . "\n" .
        "Precio final: $" . $this->getPrecioFinal();
    }

    public function mostrarProductos()
    {
        $mensaje = "";
        $coleccionProductos = $this->getColeccionProductos();

        for ($i = 0; $i < count($coleccionProductos); $i++) {
            $mensaje .= "\t" . $coleccionProductos[$i] . "\n";
        }

        return $mensaje;
    }
}
