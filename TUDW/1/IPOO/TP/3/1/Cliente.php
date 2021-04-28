<?php
include 'Persona.php';

class Cliente extends Persona
{
    // Atributos
    private $numeroCliente;

    // Constructor cliente
    public function __construct($numeroCliente, $dniPersona, $nombrePersona, $apellidoPersona)
    {
        // Cosntructor persona
        parent::__construct($dniPersona, $nombrePersona, $apellidoPersona);
        $this->nroCliente = $numeroCliente;
    }

    // Observadoras
    public function getNumeroCliente()
    {
        return $this->nroCliente;
    }

    // Modificadoras
    public function setNroCliente($numeroCliente)
    {
        $this->nroCliente = $numeroCliente;
    }

    // Metodos
    public function __toString()
    {
        $mensaje = parent::__toString();

        $mensaje .= "Numero Cliente: " . $this->getNumeroCliente() . "\n";

        return $mensaje;
    }
}
