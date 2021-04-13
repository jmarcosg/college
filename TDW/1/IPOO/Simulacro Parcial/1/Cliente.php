<?php
class Cliente
{
    /**
     * Atributos
     * string $nombreCliente, $apellidoCliente, $tipoDocumento
     * int $numeroDocumento
     * boolean $dadoDeBaja
     */
    private $nombreCliente;
    private $apellidoCliente;
    private $dadoDeBaja;
    private $tipoDocumento;
    private $numeroDocumento;

    // Contructor
    public function __construct($nombreCliente, $apellidoCliente, $dadoDeBaja, $tipoDocumento, $numeroDocumento)
    {
        $this->nombre = $nombreCliente;
        $this->apellido = $apellidoCliente;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDoc = $tipoDocumento;
        $this->nroDoc = $numeroDocumento;
    }
    // Observadoras
    public function getNombreCliente()
    {
        return $this->nombre;
    }

    public function getApellidoCliente()
    {
        return $this->apellido;
    }

    public function getDadoDeBaja()
    {
        return $this->dadoDeBaja;
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
    public function setNombre($nombreCliente)
    {
        $this->nombre = $nombreCliente;
    }

    public function setApellido($apellidoCliente)
    {
        return $this->apellido = $apellidoCliente;
    }

    public function setDadoDeBaja($dadoDeBaja)
    {
        return $this->dadoDeBaja = $dadoDeBaja;
    }

    public function setTipoDoc($tipoDocumento)
    {
        return $this->tipoDoc = $tipoDocumento;
    }

    public function setNroDoc($numeroDocumento)
    {
        return $this->nroDoc = $numeroDocumento;
    }

    // Metodos
    public function __toString()
    {
        return "Nombre: " . $this->apellido . ", " . $this->nombre . ". \n" . $this->tipoDoc . ": " . $this->nroDoc . ". \n" . "Dado de baja: " . $this->dadoDeBaja;
    }
}
