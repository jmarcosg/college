<?php
class Financiera
{
    // Atributos
    private $denominacionFinanciera;
    private $direccionFinanciera;
    private $coleccionPrestamosOtorgados;

    // Constructor
    public function __construct($denominacionFinanciera, $direccionFinanciera)
    {
        $this->denominacion = $denominacionFinanciera;
        $this->direccion = $direccionFinanciera;
        $this->colPrestamosOtorgados = [];
    }

    // Observadoras
    public function getDenominacionFinanciera()
    {
        return $this->denominacion;
    }

    public function getDireccionFinanciera()
    {
        return $this->direccion;
    }

    public function getColeccionPrestamosOtorgados()
    {
        return $this->colPrestamosOtorgados;
    }

    // Modificadoras
    public function setDenominacion($denominacionFinanciera)
    {
        $this->denominacion = $denominacionFinanciera;
    }

    public function setDireccion($direccionFinanciera)
    {
        $this->direccion = $direccionFinanciera;
    }

    public function setColPrestamosOtorgados($coleccionPrestamosOtorgados)
    {
        $this->colPrestamosOtorgados = $coleccionPrestamosOtorgados;
    }

    // Metodos
    public function __toString()
    {
        return "Denominacion: " . $this->getDenominacionFinanciera() . "\n" .
        "Direccion: " . $this->getDireccionFinanciera() . "\n" .
        "Prestamos otorgados :" . $this->prestamosOtorgadosToString() . "\n";
    }

    public function prestamosOtorgadosToString()
    {
        $mensaje = "";
        $coleccion = $this->getColeccionPrestamosOtorgados();

        for ($i = 0; $i < count($coleccion); $i++) {
            $mensaje .= "\t" . $coleccion[$i] . "\n";
        }

        return $mensaje;
    }

    public function incorporarPrestamo($nuevoPrestamo)
    {
        $colPrestamosOtorgados = $this->getColeccionPrestamosOtorgados();

        array_push($colPrestamosOtorgados, $nuevoPrestamo);
    }

    public function otorgarPrestamoSiCalifica()
    {
        $coleccionPrestamos = $this->getColeccionPrestamosOtorgados();
        $prestamosSinCuotas = $coleccionPrestamos->getColeccionCuotas();
        $refPersona = $coleccionPrestamos->getReferenciaPersona();

        for ($i = 0; $i < count($coleccionPrestamos); $i++) {
            if ($coleccionPrestamos[$i]->getColeccionCuotas() == null) {
                $montoMaximo = $coleccionPrestamos->getMontoPrestamo() / $prestamosSinCuotas->getCantidadCuotasPrestamo();

                $maximoSolicitante = (40 * $refPersona->getNetoPersona() / 100);

                if ($montoMaximo < $maximoSolicitante) {
                    $prestamosSinCuotas->otorgarPrestamo();
                }
            }
        }
    }

    public function informarCuotaPagar($idPrestamo)
    {
        $coleccionPrestamos = $this->getColeccionPrestamosOtorgados();
        $prestamoEncontrado = false;
        $i = 0;

        for ($i = 0; $i < count($coleccionPrestamos); $i++) {
            $prestamo = $coleccionPrestamos[$i];

            if ($prestamo->getIdentificacionPrestamo() == $idPrestamo) {
                $datosCuota = $prestamo->darSiguienteCuotaPagar();
            }
        }

        return $datosCuota;
    }
}
