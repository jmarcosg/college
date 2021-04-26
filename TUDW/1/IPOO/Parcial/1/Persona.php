<?php
class Persona
{
    // Atributos
    private $nombrePersona;
    private $apellidoPersona;
    private $dniPersona;
    private $direccionPersona;
    private $mailPersona;
    private $telefonoPersona;
    private $netoPersona;

    // Constructor
    public function __construct($nombrePersona, $apellidoPersona, $dniPersona, $direccionPersona, $mailPersona, $telefonoPersona, $netoPersona)
    {
        $this->nombre = $nombrePersona;
        $this->apellido = $apellidoPersona;
        $this->dni = $dniPersona;
        $this->direccion = $direccionPersona;
        $this->mail = $mailPersona;
        $this->telefono = $telefonoPersona;
        $this->neto = $netoPersona;
    }

    // Observadoras
    public function getNombrePersona()
    {
        return $this->nombre;
    }

    public function getApellidoPersona()
    {
        return $this->apellido;
    }

    public function getDniPersona()
    {
        return $this->dni;
    }

    public function getDireccionPersona()
    {
        return $this->direccion;
    }

    public function getMailPersona()
    {
        return $this->mail;
    }

    public function getTelefonoPersona()
    {
        return $this->telefono;
    }

    public function getNetoPersona()
    {
        return $this->neto;
    }

    // Modificadoras
    public function setNombre($nombrePersona)
    {
        $this->nombre = $nombrePersona;
    }

    public function setApellido($apellidoPersona)
    {
        $this->apellido = $apellidoPersona;
    }

    public function setDni($dniPersona)
    {
        $this->dni = $dniPersona;
    }

    public function setDireccion($direccionPersona)
    {
        $this->direccion = $direccionPersona;
    }

    public function setMail($mailPersona)
    {
        $this->mail = $mailPersona;
    }

    public function setTelefono($telefonoPersona)
    {
        $this->telefono = $telefonoPersona;
    }

    public function setNeto($netoPersona)
    {
        $this->neto = $netoPersona;
    }

    // Metodos
    public function __toString()
    {
        return "\tNombre : " . $this->getApellidoPersona() . ", " . $this->getNombrePersona() . "\n" .
        "\tDni: " . $this->getDniPersona() . "\n" .
        "\tDireccion: " . $this->getDireccionPersona() . "\n" .
        "\tMail: " . $this->getMailPersona() . "\n" .
        "\tTelefono: " . $this->getTelefonoContacto() . "\n" .
        "\tNeto: " . $this->getNetoPersona() . "\n";
    }
}
