<?php
class Cliente
{
    // Atributos
    private $dniPersona;
    private $nombrePersona;
    private $apellidoPersona;
    private $tipoDoc;

    // Constructor
    public function __construct($dniPersona, $nombrePersona, $apellidoPersona, $tipoDoc)
    {
        $this->dni = $dniPersona;
        $this->nombre = $nombrePersona;
        $this->apellido = $apellidoPersona;
        $this->tipoDoc = $tipoDoc;
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

    public function getTipoDoc()
    {
        return $this->tipoDoc;
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

    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;
    }

    // Metodos
    public function __toString()
    {
        return "\t" . $this->getTipoDoc() . ": " . $this->getDniPersona() . "\n" .
        "\tNombre: " . $this->getApellidoPersona() . ", " . $this->getNombrePersona() . "\n";
    }
}
