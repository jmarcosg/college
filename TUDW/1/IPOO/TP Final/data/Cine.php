<?php
include_once 'Funcion.php';
include_once 'BaseDatos.php';
class Cine extends Funcion
{
    private $genero;
    private $origen;

    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->genero = "";
        $this->origen = "";
    }

    public function cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro, $genero, $origen)
    {
        parent::cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro);
        $this->setGenero($genero);
        $this->setOrigen($origen);
    }

    // Observadoras
    public function getGenero()
    {
        return $this->genero;
    }

    public function getOrigen()
    {
        return $this->origen;
    }

    // Modificadoras
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "Genero: " . $this->getGenero() . "\n" .
        "Origen: " . $this->getOrigen() . "\n";
    }

    public function buscarCosto()
    {
        $costo = $this->getPrecio();
        $costo = parent::buscarCosto() * 1.12;
        return $costo;
    }

    /* OPERACIONES EN BASE DE DATOS */
    public function Buscar($id)
    {
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM cine WHERE id=" . $id;
        $resp = false;

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consulta)) {
                if ($row2 = $baseDatos->Registro()) {
                    parent::Buscar($id);
                    $this->setGenero($row2['genero']);
                    $this->setOrigen($row2['origen']);
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }
        return $resp;
    }

    public function listar($condicion)
    {
        $arreglo = null;
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM cine INNER JOIN funcion ON cine.id = funcion.id";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE funcion. ' . $condicion;
        }
        $consulta .= " ORDER BY genero ";

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consulta)) {
                $arreglo = array();
                while ($row2 = $baseDatos->Registro()) {
                    $objCine = new Cine();
                    $objCine->Buscar($row2['id']);
                    array_push($arreglo, $objCine);
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $arreglo;
    }

    public function insertar($idTeatro)
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if (parent::insertar($idTeatro)) {
            $consultaInsertar = "INSERT INTO cine(id, genero, origen)
				VALUES (" . parent::getId() . ",'" . $this->getGenero() . "','" . $this->getOrigen() . "')";
            if ($baseDatos->Iniciar()) {
                if ($baseDatos->Ejecutar($consultaInsertar)) {
                    $resp = true;
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        }

        return $resp;
    }

    public function modificar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if (parent::modificar()) {
            $consultaModifica = "UPDATE cine SET genero='" . $this->getGenero() . "',origen='" . $this->getOrigen() . "' WHERE id=" . parent::getId();
            if ($baseDatos->Iniciar()) {
                if ($baseDatos->Ejecutar($consultaModifica)) {
                    $resp = true;
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        }

        return $resp;
    }

    public function eliminar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if ($baseDatos->Iniciar()) {
            $consultaBorra = "DELETE FROM cine WHERE id=" . parent::getId();
            if ($baseDatos->Ejecutar($consultaBorra)) {
                if (parent::eliminar()) {
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $resp;
    }
}
