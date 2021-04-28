<?php
class CuentaBancaria
{
    //Atributos
    private $nroCuenta;
    private $datosTitular;
    private $saldoCuenta;
    private $interesAnual;

    //Constructor
    public function __construct($nroCuenta, $datosTitular, $saldoCuenta, $interesAnual)
    {
        $this->cuenta = $nroCuenta;
        $this->datosTitular = $datosTitular;
        $this->saldo = $saldoCuenta;
        $this->interesAnual = $interesAnual;
    }

    //Observadoras
    public function getNumeroCuenta()
    {
        return $this->cuenta;
    }

    public function getDatosTitular()
    {
        return $this->datosTitular;
    }

    public function getSaldoCuenta()
    {
        return $this->saldo;
    }

    public function getInteresAnual()
    {
        return $this->interesAnual;
    }

    //Modificadoras
    public function setNumeroCuenta($nroCuenta)
    {
        $this->cuenta = $nroCuenta;
    }

    public function setDatosTitular($datosTitular)
    {
        $this->datosTitular = $datosTitular;
    }

    public function setSaldoCuenta($saldoCuenta)
    {
        $this->saldo = $saldoCuenta;
    }

    public function setInteresAnual($interesAnual)
    {
        $this->interesAnual = $interesAnual;
    }

    //Metodos
    public function actualizarSaldo()
    {
        $this->setSaldoActual($this->saldo + ($this->interesAnual / 365));
    }

    /**
     * Deposita una suma de dinero a la cuenta bancaria
     * @param flaot $cantDepositada
     */
    public function depositar($cantDepositada)
    {
        $this->setSaldoCuenta($this->saldo + $cantDepositada);
    }

    /*
     * Retira una suma de dinero de la cuenta bancaria
     * @param float $cantRetirada
     * @return boolean $pudoRetirar
     */
    public function retirar($cantRetirada)
    {
        $pudoRetirar = false;

        $saldoFinal = $this->saldo - $cantRetirada;
        if ($saldoFinal > 0) {
            $this->saldo = $saldoFinal;
            $pudoRetirar = true;
        }
        return $pudoRetirar;
    }

    public function __toString()
    {
        return "Numero de cuenta: " . $this->getNumeroCuenta() .
        "\n Titular: " . $this->getDatosTitular() .
        "\n Saldo actual: " . $this->getSaldoCuenta() .
        "\n Interes anual: " . $this->getInteresAnual() . "%";
    }
}
