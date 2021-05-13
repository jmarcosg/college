<?php
class Persona
{
    // Atributos
    private $dniPersona;
    private $nombrePersona;
    private $apellidoPersona;

    // Constructor
    public function __construct($dniPersona, $nombrePersona, $apellidoPersona)
    {
        $this->dni = $dniPersona;
        $this->nombre = $nombrePersona;
        $this->apellido = $apellidoPersona;
    }

    // Observadoras
    public function getDniPersona()
    {
        return $this->dni;
    }

    public function getNombrePersona()
    {
        return $this->nombre;
    }

    public function getApellidoPersona()
    {
        return $this->apellido;
    }

    // Modificadoras
    public function setDni($dniPersona)
    {
        $this->dni = $dniPersona;
    }

    public function setNombre($nombrePersona)
    {
        $this->nombre = $nombrePersona;
    }

    public function setApellido($apellidoPersona)
    {
        $this->apellido = $apellidoPersona;
    }

    // Metodos
    public function __toString()
    {
        return "\tDNI: " . $this->getDniPersona() . "\n" .
        "\tNombre: " . $this->getApellidoPersona() . ", " . $this->getNombrePersona() . "\n";
    }
}
