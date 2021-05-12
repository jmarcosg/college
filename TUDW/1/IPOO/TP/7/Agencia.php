<?php

class Agencia
{
    private $colPaquetesTuristicos;
    private $colVentasMostrador;
    private $colVentasOnline;

    public function __construct($colPaquetesTuristicos, $colVentasMostrador, $colVentasOnline)
    {
        $this->colPaquetesTuristicos = $colPaquetesTuristicos;
        $this->colVentasMostrador = $colVentasMostrador;
        $this->colVentasOnline = $colVentasOnline;
    }

    /**
     * Get the value of colPaquetesTuristicos
     */
    public function getColPaquetesTuristicos()
    {
        return $this->colPaquetesTuristicos;
    }

    /**
     * Get the value of colVentasMostrador
     */
    public function getColVentasMostrador()
    {
        return $this->colVentasMostrador;
    }

    /**
     * Get the value of colVentasOnline
     */
    public function getColVentasOnline()
    {
        return $this->colVentasOnline;
    }

    /**
     * Set the value of colPaquetesTuristicos
     */
    public function setColPaquetesTuristicos($colPaquetesTuristicos)
    {
        $this->colPaquetesTuristicos = $colPaquetesTuristicos;
    }

    /**
     * Set the value of colVentasMostrador
     */
    public function setColVentasMostrador($colVentasMostrador)
    {
        $this->colVentasMostrador = $colVentasMostrador;
    }

    /**
     * Set the value of colVentasOnline
     */
    public function setColVentasOnline($colVentasOnline)
    {
        $this->colVentasOnline = $colVentasOnline;
    }

    // Metodos
    public function __toString()
    {
        return "Paquetes turisticos: " . $this->mostrarColeccion($this->getColPaquetesTuristicos()) . "\n" .
        "Ventas mostrador: " . $this->mostrarColeccion($this->getColVentasMostrador()) . "\n" .
        "Ventas Online: " . $this->mostrarColeccion($this->getColVentasOnline()) . "\n";
    }

    public function mostrarColeccion($coleccion)
    {
        $arregloStr = "";
        $array = $coleccion;
        $contador = count($array);

        for ($i = 0; $i < $contador; $i++) {
            $arregloStr .= $array[$i] . "\n";
            $arregloStr .= "---------------\n";
        }

        return $arregloStr;
    }

    public function incorporarPaquete($objPaqueteTuristico)
    {
        $paqueteIngresado = $this->verificarPaqueteEnFecha($objPaqueteTuristico);
        $coleccion = $this->getColPaquetesTuristicos();

        if ($paqueteIngresado == false) {
            array_push($coleccion, $objPaqueteTuristico);
            $this->setColPaquetesTuristicos($coleccion);
        }

        return !$paqueteIngresado;
    }

    private function verificarPaqueteEnFecha($objPaqueteTuristico)
    {
        $fecha = $objPaqueteTuristico->getFechaDesde();
        $colPaquetes = $this->getColPaquetesTuristicos();
        $destino = $objPaqueteTuristico->getObjDestino();
        $encontro = false;
        $i = 0;

        while ($i < count($colPaquetes) && !$encontro) {
            $fecha2 = $colPaquetes[$i]->getFechaDesde();
            $destino2 = $colPaquetes[$i]->getObjDestino();

            if ($fecha == $fecha2 && $destino == $destino2) {
                $encontro = true;
            }

            $i++;
        }

        return $encontro;
    }

    public function incorporarVenta($objPaquete, $objCliente, $cantPer, $esOnLine)
    {
        $coleccionVentasMostrador = $this->getColVentasMostrador();
        $coleccionVentasOnLine = $this->getColVentasOnline();
        $fecha = date("d / m / Y");
        $cantidadPlazasDisponibles = $objPaquete->getCantidadDisponiblePlazas();
        $precio = -1;

        if ($cantPer <= $cantidadPlazasDisponibles) {
            if ($esOnLine) {
                $ventaOnLine = new VentaOnLine($fecha, $objPaquete, $cantPer, $objCliente);

                array_push($coleccionVentasOnLine, $ventaOnLine);
                $this->setColVentasOnline($coleccionVentasOnLine);

                $precio = $ventaOnLine->darImporteVenta();
            } else {
                $ventaPorMostrador = new Ventas($fecha, $objPaquete, $cantPer, $objCliente);

                array_push($coleccionVentasMostrador, $ventaPorMostrador);
                $this->setColVentasMostrador($coleccionVentasMostrador);

                $precio = $ventaPorMostrador->darImporteVenta();
            }

            $plazasRestantes = $objPaquete->getCantidadDisponiblePlazas() - $cantPer;
            $objPaquete->setCantidadDisponiblePlazas($plazasRestantes);
        }

        return $precio;
    }

    public function informarPaquetesTuristicos($fecha, $destino)
    {
        $coleccion = $this->getColPaquetesTuristicos();
        $nuevaColeccionPaquetesFecha = null;

        foreach ($coleccion as $paquete) {
            $fechaPaquete = $paquete->getFechaDesde();
            $destinoPaquete = $paquete->getDestino();

            if ($fechaPaquete == $fecha && $destinoPaquete == $destino) {
                array_push($nuevaColeccionPaquetesFecha, $paquete);
            }
        }

        return $nuevaColeccionPaquetesFecha;
    }

    public function paqueteMasEconomico($fecha, $destino)
    {
        $coleccion = $this->getColPaquetesTuristicos();
        $paqueteMasEconomico = null;
        $precioNormal = 999999999999999999;

        foreach ($coleccion as $paquete) {
            $cantidadDias = $paquete->getCantidadDias();
            $objDestino = $paquete->getObjDestino();
            $precioPorDia = $objDestino->getPrecioPorDia();
            $precioTotal = $precioPorDia * $cantidadDias;

            if ($precioTotal < $precioNormal) {
                $precioNormal = $precioTotal;
                $paqueteMasEconomico = $paquete;
            }
        }

        return $paqueteMasEconomico;
    }

    public function informarConsumoCliente($objCliente)
    {
        $coleccionPaquetesCliente = null;
        $coleccionMostrador = $this->getColVentasMostrador();
        $coleccionOnLine = $this->getColVentasOnline();
        $coleccionVentas = array_merge($coleccionMostrador, $coleccionOnLine);
        $tipoDocClienteSolicitud = $objCliente->getTipoDoc();
        $numeroDocClienteSolicitud = $objCliente->getDniPersona();

        foreach ($coleccionVentas as $venta) {
            $cliente = $venta->getObjCliente();
            $tipoDocClienteVenta = $cliente->getTipoDoc();
            $numeroDocClienteVenta = $cliente->getDniPersona();

            if ($tipoDocClienteVenta == $tipoDocClienteSolicitud && $numeroDocClienteVenta == $numeroDocClienteSolicitud) {
                $paquete = $venta->getObjPaquete();
                array_push($coleccionPaquetesCliente, $paquete);
            }
        }

        return $coleccionPaquetesCliente;
    }

    public function informarPaquetesMasVendido($anio, $n)
    {
        $coleccionMostrador = $this->getColVentasMostrador();
        $coleccionOnLine = $this->getColVentasOnline();
        $coleccionVentas = array_merge($coleccionMostrador, $coleccionOnLine);
        $coleccionPaqueteVendidos = $this->recuperarPaquetesVendidos($coleccionVentas);
        $coleccionPaquetesMasVendidos = null;

        $arrayPV = $this->armarArrayPaquetesVendidos($coleccionPaqueteVendidos, $coleccionVentas, $anio);

        for ($i = 0; $i < $n; $i++) {
            $paquete = $arrayPV[$i];
            array_push($coleccionPaquetesMasVendidos, $paquete);
        }

        return $coleccionPaquetesMasVendidos;
    }

    private function recuperarPaquetesVendidos($coleccionVentas)
    {
        // Testeo de Christhian
        $colPaquetes = null;

        foreach ($coleccionVentas as $venta) {
            $paqueteVenta = $venta->getObjPaquete();

            if ($colPaquetes == null) {
                array_push($colPaquetes, $paqueteVenta);
            } else {
                foreach ($colPaquetes as $paquete) {
                    if ($paqueteVenta != $paquete) {
                        array_push($colPaquetes, $paqueteVenta);
                    }
                }
            }
        }

        return $colPaquetes;
    }

    private function armarArrayPaquetesVendidos($coleccionPaqueteVendidos, $coleccionVentas, $anio)
    {
        $arrayPaqueteVentas = [];

        foreach ($coleccionPaqueteVendidos as $paqueteVendido) {
            $cantPaquetesVendidos = 0;

            foreach ($coleccionVentas as $venta) {
                $paqueteVenta = $venta->getObjPaquete();
                $fechaVenta = $venta->getFecha();
                $anioVenta = date("Y", $fechaVenta);

                if ($paqueteVenta == $paqueteVendido && $anio == $anioVenta) {
                    $cantPaquetesVendidos++;
                }
            }

            $arrayPaquetesVendidos = ["objPaquete" => $paqueteVendido, "cantPaquetes" => $cantPaquetesVendidos];
            array_push($arrayPaqueteVentas, $arrayPaquetesVendidos);
        }

        $arrayPaqueteVentas = arsort($arrayPaqueteVentas);

        return $arrayPaqueteVentas;
    }
}
