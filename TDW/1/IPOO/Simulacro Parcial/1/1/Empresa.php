<?php
class Empresa
{
    // Atributos
    private $denominacionEmpresa;
    private $direccionEmpresa;
    private $objColeccionClientes;
    private $objColeccionProductos;
    private $objColeccionVentasRealizadas;

    // Constructor
    public function __construct($denominacionEmpresa, $direccionEmpresa, $objColeccionClientes, $objColeccionProductos, $objColeccionVentasRealizadas)
    {
        $this->denominacion = $denominacionEmpresa;
        $this->direccion = $direccionEmpresa;
        $this->clientes = $objColeccionClientes;
        $this->productos = $objColeccionProductos;
        $this->ventasRealizadas = $objColeccionVentasRealizadas;
    }

    // Observadoras
    public function getDenominacionEmpresa()
    {
        return $this->denominacion;
    }

    public function getDireccionEmpresa()
    {
        return $this->direccion;
    }

    public function getColeccionClientes()
    {
        return $this->clientes;
    }

    public function getColeccionProductos()
    {
        return $this->productos;
    }

    public function getVentasRealizadas()
    {
        return $this->ventasRealizadas;
    }

    // Modificadoras
    public function setDenominacion($denominacionEmpresa)
    {
        $this->denominacion = $denominacionEmpresa;
    }

    public function setDireccion($direccionEmpresa)
    {
        $this->direccion = $direccionEmpresa;
    }

    public function setClientes($objColeccionClientes)
    {
        $this->clientes = $objColeccionClientes;
    }

    public function setProductos($objColeccionProductos)
    {
        $this->productos = $objColeccionProductos;
    }

    public function setVentasRealizadas($objColeccionVentasRealizadas)
    {
        $this->ventasRealizadas = $objColeccionVentasRealizadas;
    }

    // Metodos
    public function retornarProducto($codigoProducto)
    {
        $i = 0;
        $productoEncontrado = false;
        $objProducto = null;

        while ($i < count($this->getColeccionProductos()) && !$productoEncontrado) {
            if ($this->coleccionProductos[$i]->getCodigoProducto() == $codigoProducto) {
                $objProducto = $this->productos[$i];
                $productoEncontrado = true;
            }
            $i++;
        }
    }

    public function registrarVenta($codigosProductos, $objCliente)
    {
        $precioFinal = 0;
        $ventasRealizadas = $this->getVentasRealizadas();

        if (!$objCliente->getDadoDeBaja()) {
            $numeroNuevaVenta = count($this->ventasRealizadas);
            $fechaVenta = date('Y');
            $nuevaVenta = new Venta($numeroNuevaVenta, $fechaVenta, $objCliente);

            for ($i = 0; $i < count($codigosProductos); $i++) {
                $codigoProducto = $codigosProductos[$i];
                $nuevoProducto = $this->retornarProducto($codigoProducto);

                if ($nuevoProducto != null) {
                    $nuevaVenta = incorporarProducto($nuevoProducto);
                }
            }

            if (count($nuevaVenta->getColeccionProductos()) != 0) {
                $objColeccionVentasRealizadas[count($objColeccionVentasRealizadas)] = $nuevaVenta;
                $this->setVentasRealizadas($objColeccionVentasRealizadas);
                $precioFinal = $nuevaVenta->getPrecioFinal();
            }
        }

        return $precioFinal;
    }

    public function retornarVentasPorCliente($tipoDoc, $numDoc)
    {
        $ventasRealizadas = [];

        foreach ($this->getVentasRealizadas() as $objVenta) {
            $objCliente = $objVenta->getCliente();

            if ($objCliente->getTipoDocumento() == $tipoDoc && $objCliente->getNumeroDocumento() == $numDoc) {
                array_push($ventasRealizadas, $objVenta);
            }
        }

        return $ventasRealizadas;
    }

}
