<?php
include_once 'BaseDatos.php';

class Teatro
{
    private $id;
    private $nombre;
    private $ciudad;
    private $direccion;

    // Constructor
    public function __construct()
    {
        $this->id = 0;
        $this->nombre = "";
        $this->ciudad = "";
        $this->direccion = "";
    }
}
