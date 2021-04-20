<?php
class Tienda
{
    // Atributos
    private $nombreTienda;
    private $direccionTienda;
    private $telefonoTienda;
    private $coleccionProductos;
    private $coleccionVentasRealizadas;

    // Constructor
    public function __construct($nombreTienda, $direccionTienda, $telefonoTienda, $coleccionProductos, $coleccionVentasRealizadas)
    {
        $this->nombre = $nombreTienda;
        $this->direccion = $direccionTienda;
        $this->telefono = $telefonoTienda;
        $this->colProductos = $coleccionProductos;
        $this->colVentasRealizadas = $coleccionVentasRealizadas;
    }

    // Observadoras
    public function getNombreTienda()
    {
        return $this->nombre;
    }

    public function getDireccionTienda()
    {
        return $this->direccion;
    }

    public function getTelefonoTienda()
    {
        return $this->telefono;
    }

    public function getColeccionProductos()
    {
        return $this->colProductos;
    }

    public function getColeccionVentasRealizadas()
    {
        return $this->colVentasRealizadas;
    }

    // Modificadoras
    public function setNombre($nombreTienda)
    {
        $this->nombre = $nombreTienda;
    }

    public function setDireccion($direccionTienda)
    {
        $this->direccion = $direccionTienda;
    }

    public function setTelefono($telefonoTienda)
    {
        $this->telefono = $telefonoTienda;
    }

    public function setColProductos($coleccionProductos)
    {
        $this->colProductos = $coleccionProductos;
    }

    public function setColVentasRealizadas($coleccionVentasRealizadas)
    {
        $this->colVentasRealizadas = $coleccionVentasRealizadas;
    }

    // Metodos
    public function __toString()
    {
        return "Nombre de la tienda: " . $this->getNombreTienda() . "\n" .
        "Direccion: " . $this->getDireccionTienda() . "\n" .
        "Telefono: " . $this->getTelefonoTienda() . "\n" .
        "Productos: \n" . $this->productosToString() . "\n" .
        "Ventas realizadas: \n" . $this->ventasRealizadasToString();
    }

    public function productosToString()
    {
        $mensaje = "";
        $coleccion = $this->getColeccionProductos();

        for ($i = 0; $i < count($coleccion); $i++) {
            $mensaje .= "\t" . $coleccion[$i] . "\n";
        }

        return $mensaje;
    }

    public function ventasRealizadasToString()
    {
        $mensaje = "";
        $coleccion = $this->getColeccionVentasRealizadas();

        for ($i = 0; $i < count($coleccion); $i++) {
            $mensaje .= "\t" . $coleccion[$i] . "\n";
        }

        return $mensaje;
    }

    public function buscarProducto($codigoBuscado)
    {
        $colProductos = $this->getColeccionProductos();
        $i = 0;
        $codigoEncontrado = false;

        while ($i < count($colProductos) && !$codigoEncontrado) {
            $objProducto = $colProductos[$i];
            if ($objProducto->getCodigoBarraProducto() == $codigoBuscado) {
                $objProducto = $colProductos[$i];
                $codigoEncontrado = true;
            }
            $i++;
        }

        return $objProducto;
    }

    public function realizarVenta($arregloVentas)
    {
        $colVentasRealizadas = $this->getColeccionVentasRealizadas();
        $colProductos = $this->getColeccionProductos();

        for ($i = 0; $i < count($arregloVentas); $i++) {
            $codigoNuevaVenta = $arregloVentas[$i]["codigoBarra"];
            $cantidadVenta = $arregloVentas[$i]["cantidad"];
            $objProducto = $this->buscarProducto($codigoNuevaVenta);

            echo "objProductoif: " . $objProducto;

            if (!is_null($objProducto)) {
                array_push($colVentasRealizadas, $objProducto);
                $this->setColVentasRealizadas($colVentasRealizadas);

                foreach ($colVentasRealizadas as $objVentas) {
                    $productoIncorporado = $colVentasRealizadas->incorporarProducto($objProducto, $cantidadVenta);

                    if ($productoIncorporado) {
                        $objVentas = $this->getColeccionVentasRealizadas();
                    }
                }
            }
        }

        return $objVenta;
    }
}
