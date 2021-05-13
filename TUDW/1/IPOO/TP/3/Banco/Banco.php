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
        return "Cuenta corriente: " . $this->mostrarColeccion($this->getColeccionCuentaCorriente()) . "\n" .
        "Caja de ahorro: " . $this->mostrarColeccion($this->getColeccionCuentaAhorro()) . "\n" .
        "Ultimo valor agregado: " . $this->getUltimoValorCuentaAgregado() . "\n" .
        "Cliente: " . $this->mostrarColeccion($this->getColeccionCliente()) . "\n";
    }

    public function mostrarColeccion($coleccion)
    {
        $mensaje = "";
        $array = $coleccion;
        $contador = count($array);

        for ($i = 0; $i < $contador; $i++) {
            $mensaje .= $array[$i] . "\n";
            $mensaje .= "---------------\n";
        }

        return $mensaje;
    }

    public function incorporarCliente($objCliente)
    {
        $colClientes = $this->getColeccionCliente();
        $clienteYaExistente = verificarExistenciaCliente($colClientes, $objCliente);

        if (!$clienteYaExistente) {
            array_push($colClientes, $objCliente);
        }

    }

    public function verificarExistenciaCliente($coleccion, $objCliente)
    {
        $clienteYaExistente = true;

        for ($i = 0; $i < count($coleccion); $i++) {
            if ($objCliente != $coleccion[$i]) {
                $clienteYaExistente = false;
            }
        }

        return $clienteYaExistente;
    }

    public function incorporarCuentaCorriente($numeroCliente)
    {

    }
}
