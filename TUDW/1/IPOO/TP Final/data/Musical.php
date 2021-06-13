<?php
include_once 'Funcion.php';
include_once 'BaseDatos.php';

class Musical extends Funcion
{
    private $director;
    private $cantidadPersonas;

    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->director = "";
        $this->cantidadPersonas = 0;
    }

    public function cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro, $director, $cantidadPersonas)
    {
        parent::cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro);
        $this->setDirector($director);
        $this->setCantPersonas($cantidadPersonas);
    }

    // Observadoras
    public function getDirector()
    {
        return $this->director;
    }

    public function getCantidadPersonas()
    {
        return $this->cantidadPersonas;
    }

    // Modificadoras
    public function setDirector($director)
    {
        $this->director = $director;
    }

    public function setCantidadPersonas($cantidadPersonas)
    {
        $this->cantidadPersonas = $cantidadPersonas;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString() . "Director: " . $this->getDirector() . "\n" .
        "Cantidad de personas: " . $this->getCantidadPersonas() . "\n";
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
        $consulta = "SELECT * FROM musical WHERE id=" . $id;
        $resp = false;

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consulta)) {
                if ($row2 = $baseDatos->Registro()) {
                    parent::Buscar($id);
                    $this->setDirector($row2['director']);
                    $this->setCantidadPersonas($row2['cantidad_personas']);
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
        $consulta = "SELECT * FROM musical INNER JOIN funcion ON musical.id = funcion.id";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE funcion. ' . $condicion;
        }
        $consulta .= " ORDER BY director ";

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consulta)) {
                $arreglo = array();
                while ($row2 = $baseDatos->Registro()) {
                    $objMusical = new Musical();
                    $objMusical->Buscar($row2['id']);
                    array_push($arreglo, $objMusical);
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
            $consultaInsertar = "INSERT INTO musical(id, director, cantidad_personas)
				VALUES (" . parent::getId() . ",'" . $this->getDirector() . "','" . $this->getCantidadPersonas() . "')";

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
            $consultaModifica = "UPDATE musical SET director='" . $this->getDirector() . "',cantidad_personas='" . $this->getCantidadPersonas() . "' WHERE id=" . parent::getId();

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
            $consultaBorra = "DELETE FROM musical WHERE id=" . parent::getId();
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
