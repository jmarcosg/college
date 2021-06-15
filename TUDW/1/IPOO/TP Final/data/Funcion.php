<?php
include_once 'Teatro.php';
include_once 'BaseDatos.php';

class Funcion
{
    private $id;
    private $nombre;
    private $horarioInicio;
    private $duracion;
    private $precio;
    private $tipo;
    private $idTeatro;
    private $mensajeOperacion;

    // Constructor
    public function __construct()
    {
        $this->id = 0;
        $this->nombre = "";
        $this->horarioInicio = "";
        $this->duracion = 0;
        $this->precio = 0;
        $this->tipo = "";
        $this->idTeatro = 0;
    }

    // Cargar
    public function cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setHorarioInicio($horarioInicio);
        $this->setDuracion($duracion);
        $this->setPrecio($precio);
        $this->setTipo($tipo);
        $this->setIdTeatro($idTeatro);
    }

    // Observadoras
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getHorarioInicio()
    {
        return $this->horarioInicio;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getIdTeatro()
    {
        return $this->idTeatro;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    // Modificadoras
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setHorarioInicio($horarioInicio)
    {
        $this->horarioInicio = $horarioInicio;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setIdTeatro($idTeatro)
    {
        $this->idTeatro = $idTeatro;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    // Metodos
    public function __toString()
    {
        return "ID: " . $this->getId() . "\n" .
        "Nombre: " . $this->getNombre() . "\n" .
        "Horario inicio: " . $this->getHorarioInicio() . "\n" .
        "Duracion: " . $this->getDuracion() . "\n" .
        "Precio: " . $this->getPrecio() . "\n" .
        "Tipo: " . $this->getTipo() . "\n" .
        "ID Teatro: " . $this->getIdTeatro() . "\n";
    }

    public function buscarCosto()
    {
        $costo = $this->getPrecio();

        return $costo;
    }

    /* OPERACIONES EN BASE DE DATOS */
    public function buscar($id)
    {
        $baseDatos = new BaseDatos();
        $consultaFuncion = "SELECT * FROM funcion WHERE id=" . $id;
        $resp = false;

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consultaFuncion)) {
                if ($row2 = $baseDatos->Registro()) {
                    $this->setId($id);
                    $this->setNombre($row2['nombre']);
                    $this->setHorarioInicio($row2['horario_inicio']);
                    $this->setDuracion($row2['duracion']);
                    $this->setPrecio($row2['precio']);
                    $this->setTipo($row2['tipo']);
                    $this->setIdTeatro($row2['id_teatro']);
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
        $arregloFuncion = null;
        $baseDatos = new BaseDatos();
        $consultaFuncion = "SELECT * FROM funcion";

        if ($condicion != "") {
            $consultaFuncion = $consultaFuncion . " WHERE " . $condicion;
        }
        $consultaFuncion .= " ORDER BY nombre ";

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consultaFuncion)) {
                $arregloFuncion = array();
                while ($row2 = $baseDatos->Registro()) {
                    $id = $row2['id'];
                    $nombre = $row2['nombre'];
                    $horarioInicio = $row2['horario_inicio'];
                    $duracion = $row2['duracion'];
                    $precio = $row2['precio'];
                    $tipo = $row2['tipo'];
                    $idTeatro = $row2['id_teatro'];

                    $objFuncion = new Funcion();
                    $objFuncion->cargar($id, $nombre, $horarioInicio, $duracion, $precio, $tipo, $idTeatro);
                    array_push($arregloFuncion, $objFuncion);
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $arregloFuncion;
    }

    public function insertar($idTeatro)
    {
        $baseDatos = new BaseDatos();
        $resp = false;
        $consultaInsertar = "INSERT INTO funcion(id, nombre, horario_inicio, duracion, precio, tipo, id_teatro)
				VALUES (" . $this->getId() . ",'" . $this->getNombre() . "','" . $this->getHorarioInicio() . "'," . $this->getDuracion() . "," . $this->getPrecio() . ",'" . $this->getTipo() . "'," . $idTeatro . ")";

        if ($baseDatos->Iniciar()) {

            if ($id = $baseDatos->devuelveIDInsercion($consultaInsertar)) {
                $this->setId($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $resp;
    }

    public function modificar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;
        $consultaModifica = "UPDATE funcion SET nombre='" . $this->getNombre() . "',horario_inicio='" . $this->getHorarioInicio() . "',duracion='" . $this->getDuracion() . "',precio='" . $this->getPrecio() . "',tipo='" . $this->getTipo() . "',id_teatro='" . $this->getIdTeatro() . "' WHERE id='" . $this->getIdTeatro() . "'";

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consultaModifica)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $resp;
    }

    public function eliminar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if ($baseDatos->Iniciar()) {
            $consultaBorra = "DELETE FROM funcion WHERE id=" . $this->getId();
            if ($baseDatos->Ejecutar($consultaBorra)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $resp;
    }
}
