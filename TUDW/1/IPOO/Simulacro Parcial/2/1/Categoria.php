<?php
class Categoria
{
    private $idCategoria;
    private $descripcion;

    public function __construct($idCategoria, $descripcion)
    {
        $this->idCategoria = $idCategoria;
        $this->descripcion = $descripcion;
    }

    // Observadoras
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    // Modificadoras
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    // Metodos
    public function __toString()
    {
        return "ID Categoria: " . $this->getIdCategoria() . "\n" .
        "Descripcion: " . $this->getDescripcion() . "\n";
    }
}
