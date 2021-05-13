<?php
class Duenio
{
    // Atributos
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $numeroDocumento;

    // Constructor
    public function __construct($nombre, $apellido, $tipoDocumento, $numeroDocumento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDoc = $tipoDocumento;
        $this->numDoc = $numeroDocumento;
    }

    // Observadoras
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getTipoDocumento()
    {
        return $this->tipoDoc;
    }

    public function getNumeroDocumento()
    {
        return $this->numDoc;
    }

    // Modificadoras
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setTipoDoc($tipoDocumento)
    {
        $this->tipoDoc = $tipoDocumento;
    }

    public function setNumDoc($numeroDocumento)
    {
        $this->numDoc = $numeroDocumento;
    }

    // Metodos
    public function __toString()
    {
        return "Nombre: " . $this->getApellido() . ", " . $this->getNombre() . "\n" .
        "Documento: " . $this->getTipoDocumento() . ". " . $this->getNumeroDocumento() . "\n";
    }
}
