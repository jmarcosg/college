<?php
include_once 'Funcion.php';
include_once 'BaseDatos.php';

class ObraTeatra extends Funcion
{
    private $autor;

    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->autor = "";
    }

    public function cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro, $autor)
    {
        parent::cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro);
        $this->setAutor($autor);
    }

    // Observadoras
    public function getAutor()
    {
        return $this->autor;
    }

    // Modificadoras
    public function setAutor($autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "Autor: " . $this->getAutor() . "\n";
    }

    public function buscarCosto()
    {
        $costo = $this->getPrecio();
        $costo = parent::buscarCosto() * 1.45;
        return $costo;
    }

    /* OPERACIONES EN BASE DE DATOS */
    public function Buscar($id)
    {
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM obras_teatral WHERE id=" . $id;
        $resp = false;

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consulta)) {
                if ($row2 = $baseDatos->Registro()) {
                    parent::Buscar($id);
                    $this->setAutor($row2['autor']);
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

    public function listar($condicion = "")
    {
        $arreglo = null;
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM obras_teatrales INNER JOIN funcion ON obras_teatral.id = funcion.id";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE funcion. ' . $condicion;
        }
        $consulta .= " ORDER BY autor ";

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consulta)) {
                $arreglo = array();
                while ($row2 = $baseDatos->Registro()) {
                    $objObraTeatral = new ObrasTeatrales();
                    $objObraTeatral->Buscar($row2['id']);
                    array_push($arreglo, $objObraTeatral);
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
            $consultaInsertar = "INSERT INTO obras_teatral(id, autor)
				VALUES (" . parent::getId() . ",'" . $this->getAutor() . "')";
            if ($baseDatos->Iniciar()) {
                if ($base->Ejecutar($consultaInsertar)) {
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
            $consultaModifica = "UPDATE obras_teatral SET autor='" . $this->getAutor() . "' WHERE id=" . parent::getId();
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
            $consultaBorra = "DELETE FROM obras_teatral WHERE id=" . parent::getId();
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
