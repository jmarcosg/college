<?php
class Banco
{
    // Atributos
    private $coleccionCuentaCorriente;
    private $coleccionCajaAhorro;
    private $ultimoValorCuentaAgregado;
    private $coleccionCliente;

    // Constructor
    public function __construct($coleccionCuentaCorriente, $coleccionCajaAhorro, $ultimoValorCuentaAgregado, $coleccionCliente)
    {
        $this->colCtaCorriente = $coleccionCuentaCorriente;
        $this->colCajaAhorro = $coleccionCajaAhorro;
        $this->ultimoValorAgregado = $ultimoValorCuentaAgregado;
        $this->colCliente = $coleccionCliente;
    }

    // Observadoras
    public function getColeccionCuentaCorriente()
    {
        return $this->colCtaCorriete;
    }

    public function getColeccionCajaAhorro()
    {
        return $this->colCajaAhorro;
    }

    public function getUltimoValorCuentaAgregado()
    {
        return $this->ultimoValorAgregado;
    }

    public function getColeccionCliente()
    {
        return $this->colCliente;
    }

    // Modificadoras
    public function setColCtaCorriente($coleccionCuentaCorriente)
    {
        $this->colCtaCorriente = $coleccionCuentaCorriente;
    }

    public function setColCajaAhorro($coleccionCajaAhorro)
    {
        $this->colCtaAhorro = $coleccionCajaAhorro;
    }

    public function setUltimoValorAgregado($ultimoValorCuentaAgregado)
    {
        $this->ultimoValorAgregado = $ultimoValorCuentaAgregado;
    }

    public function setColCliente($coleccionCliente)
    {
        $this->colCliente = $coleccionCliente;
    }

    // Metodos
    public function __toString()
    {
        return "Cuenta corriente: " . $this->ctaCorrienteToString() . "\n" .
        "Caja de ahorro: " . $this->ctaAhorroToString() . "\n" .
        "Ultimo valor agregado: " . $this->getUltimoValorCuentaAgregado() . "\n" .
        "Cliente: " . $this->clienteToString() . "\n";
    }

    public function ctaCorrienteToString()
    {
        $mensaje = "";
        $coleccion = $this->getColeccionCuentaCorriente();

        for ($i = 0; $i < count($coleccion); $i++) {
            $mensaje .= $coleccion[$i] . "\n";
        }

        return $mensaje;
    }

    public function ctaAhorroToString()
    {
        $mensaje = "";
        $coleccion = $this->getColeccionCajaAhorro();

        for ($i = 0; $i < count($coleccion); $i++) {
            $mensaje .= $coleccion[$i] . "\n";
        }

        return $mensaje;
    }

    public function clienteToString()
    {
        $mensaje = "";
        $coleccion = $this->getColeccionCliente();

        for ($i = 0; $i < count($coleccion); $i++) {
            $mensaje .= $coleccion[$i] . "\n";
        }

        return $mensaje;
    }
}
