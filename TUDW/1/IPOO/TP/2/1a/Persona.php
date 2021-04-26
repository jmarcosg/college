<?php
class Persona
{
    /**
     * Atributos
     * string $nombrePersona, $apellidoPersona, $tipoDocumento
     * int $numeroDocumento
     */
    private $nombrePersona;
    private $apellidoPersona;
    private $tipoDocumento;
    private $numeroDocumento;

    // Constructor
    public function __construct($nombrePersona, $apellidoPersona, $tipoDocumento, $numeroDocumento)
    {
        $this->nombre = $nombrePersona;
        $this->apellido = $apellidoPersona;
        $this->tipoDoc = $tipoDocumento;
        $this->nroDoc = $numeroDocumento;
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

    public function getTipoDocumento()
    {
        return $this->tipoDoc;
    }

    public function getNumeroDocumento()
    {
        return $this->nroDoc;
    }

    // Modificadoras
    public function setNombrePersona($nombrePersona)
    {
        $this->nombre = $nombrePersona;
    }

    public function setApellidoPersona($apellidoPersona)
    {
        $this->apellido = $apellidoPersona;
    }

    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDoc = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->nroDoc = $numeroDocumento;
    }

    // Metodos
    public function __toString()
    {
        return "Nombre: " . $this->apellido . ", " . $this->nombre . ". " . $this->tipoDoc . ": " . $this->nroDoc;
    }
}
