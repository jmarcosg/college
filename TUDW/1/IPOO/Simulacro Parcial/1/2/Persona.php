<?php
class Persona
{
    // Atributos
    private $tipoDocumento;
    private $numeroDocumento;
    private $nombrePersona;
    private $apellidoPersona;
    private $telefonoContacto;

    // Constructor
    public function __construct($tipoDocumento, $numeroDocumento, $nombrePersona, $apellidoPersona, $telefonoContacto)
    {
        $this->tipoDoc = $tipoDocumento;
        $this->numDoc = $numeroDocumento;
        $this->nombre = $nombrePersona;
        $this->apellido = $apellidoPersona;
        $this->telefono = $telefonoContacto;
    }

    // Observadoras
    public function getTipoDocumento()
    {
        return $this->tipoDoc;
    }

    public function getNumeroDocumento()
    {
        return $this->numDoc;
    }

    public function getNombrePersona()
    {
        return $this->nombre;
    }

    public function getApellidoPersona()
    {
        return $this->apellido;
    }

    public function getTelefonoContacto()
    {
        return $this->telefono;
    }

    // Modificadoras
    public function setTipoDoc($tipoDocumento)
    {
        $this->tipoDoc = $tipoDocumento;
    }

    public function setNumDoc($numeroDocumento)
    {
        $this->numDoc = $numeroDocumento;
    }

    public function setNombre($nombrePersona)
    {
        $this->nombre = $nombrePersona;
    }

    public function setApellido($apellidoPersona)
    {
        $this->apellido = $apellidoPersona;
    }

    public function setTelefono($telefonoContacto)
    {
        $this->telefono = $telefonoContacto;
    }

    // Metodos
    public function __toString()
    {
        return "\tNombre : " . $this->getApellidoPersona() . ", " . $this->getNombrePersona() . "\n" .
        "\tDocumento: " . $this->getTipoDocumento() . " " . $this->getNumeroDocumento() . "\n" .
        "\tTelefono: " . $this->getTelefonoContacto() . "\n";
    }

}
