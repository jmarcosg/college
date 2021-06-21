<?php
include_once 'BaseDatos.php';

class Funcion
{
    private $id;
    private $nombre;
    private $fecha;
    private $horarioInicio;
    private $duracion;
    private $precio;
    private $costoSala;
    private $objTeatro;
    private $mensajeOperacion;

    // Constructor
    public function __construct()
    {
        $this->id = 0;
        $this->nombre = "";
        $this->fecha = 0;
        $this->horarioInicio = "";
        $this->duracion = 0;
        $this->precio = 0;
        $this->costoSala = 0;
        $this->objTeatro = null;
    }

    public function cargar($datosFuncion)
    {
        $this->setNombre($datosFuncion["nombre"]);
        $this->setFecha($datosFuncion["fecha"]);
        $this->setHorarioInicio($datosFuncion["horario_inicio"]);
        $this->setDuracion($datosFuncion["duracion"]);
        $this->setPrecio($datosFuncion["precio"]);
        $this->setObjTeatro($datosFuncion["teatro"]);
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

    public function getFecha()
    {
        return $this->fecha;
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

    public function getCostoSala()
    {
        return $this->costoSala;
    }

    public function getObjTeatro()
    {
        return $this->objTeatro;
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

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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

    public function setCostoSala($costo)
    {
        $this->costoSala = $costo;
    }

    public function setObjTeatro($objTeatro)
    {
        $this->objTeatro = $objTeatro;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    // Metodos
    public function __toString()
    {
        // Convierto el horario y duracion que estan en un total de segundos a horas y minutos individuales
        $horaInicio = intdiv(intval($this->getHorarioInicio()), 3600);
        $minutosInicio = intdiv((intval($this->getHorarioInicio()) % 3600), 60);
        $duracionMinutos = intdiv(intval($this->getDuracion()), 60);

        return "ID: " . $this->getId() . "\n" .
        "Nombre: " . $this->getNombre() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Horario inicio: " . $horaInicio . ":" . $minutosInicio . "\n" .
        "Duracion: " . $duracionMinutos . " mins" . "\n" .
        "Precio: $" . $this->getPrecio() . "\n" .
        "Costo sala: $" . $this->getCostoSala() . "\n";
        //"Teatro al que pertenece: " . $this->getObjTeatro()->getNombre() . "\n";
    }

    /* OPERACIONES EN BASE DE DATOS */

    /**
     * Busca y recupera los datos de una funcion por id
     * @param int $id
     * @return boolean $resp
     */
    public function buscar($id)
    {
        $baseDatos = new BaseDatos();
        $consultaPersona = "SELECT * FROM funcion WHERE id = " . $id;
        $resp = false;

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consultaPersona)) {
                if ($row2 = $baseDatos->Registro()) { // Seteo los valores de de la funcion
                    $this->setId($id);
                    $this->setNombre($row2['nombre']);
                    $this->setFecha($row2['fecha']);
                    $this->setHorarioInicio($row2['horario_inicio']);
                    $this->setDuracion($row2['duracion']);
                    $this->setPrecio($row2['precio']);
                    $this->setCostoSala($row2['costo_sala']);

                    $idTeatro = $row2['idTeatro'];
                    $objTeatro = new Teatro();
                    $objTeatro->buscar($idTeatro);
                    $this->setObjTeatro($idTeatro);

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

    /**
     * Lista los datos de todas las funciones que cumplan con la condicion recibida por parametro
     * Devuelve un array con los datos todas las funciones
     * @param String $condicion
     * @return Array $arregloFuncion
     */
    public function listar($condicion = "")
    {
        $arregloFuncion = null;
        $baseDatos = new BaseDatos();
        $consultaFuncion = "SELECT * FROM funcion ";

        // Si la condicion recibida por parametero no esta vacia, arma un nuevo string para la consulta en la bd
        if ($condicion != "") {
            $consultaFuncion = $consultaFuncion . ' WHERE ' . $condicion;
        }

        // Le concateno a la consulta que ordene de forma ascendente con los id de las funciones
        $consultaFuncion .= " ORDER BY id";

        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consultaFuncion)) {
                $arregloFuncion = [];
                while ($row2 = $baseDatos->Registro()) { // Creo una nueva instancia funcion la cual pusheo al array que devuelvo
                    $id = $row2['id'];
                    $nombre = $row2['nombre'];
                    $fecha = $row2['fecha'];
                    $horarioInicio = $row2['horario_inicio'];
                    $duracion = $row2['duracion'];
                    $precio = $row2['precio'];
                    $costoSala = $row2['costo_sala'];
                    $idTeatro = $row2['idTeatro'];

                    $objTeatro = new Teatro();
                    $objTeatro->buscar($idTeatro);

                    $funcion = new Funcion();
                    $datosFuncion = ["nombre" => $nombre,
                        "fecha" => $fecha,
                        "horario_inicio" => $horarioInicio,
                        "duracion" => $duracion,
                        "precio" => $precio,
                        "costo_sala" => $costoSala,
                        "teatro" => $objTeatro,
                    ];
                    $funcion->cargar($datosFuncion);
                    $funcion->setId($id);

                    array_push($arregloFuncion, $funcion);
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $arregloFuncion;
    }

    /**
     * Inserta una nueva tupla en la tabla funcion
     * @return boolean $resp
     */
    public function insertar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        // Armo una consulta para insertar nombre, fecha, horario de inicio, duracion, precio e idTeatro en la tabla funcion
        $consultaInsertar = "INSERT INTO funcion(nombre, fecha, horario_inicio, duracion, precio, costo_sala, idTeatro) VALUES
        (" . "'" . $this->getNombre() . "','" . $this->getFecha() . "','" . $this->getHorarioInicio() . "','" . $this->getDuracion() . "','" . $this->getPrecio() . "','" . $this->getCostoSala() . "','" . $this->getObjTeatro()->getId() . "')";

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

    /**
     * Modifica los values de una tupla en la tabla funcion
     * @return boolean $resp
     */
    public function modificar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        // nombre, fecha, horario_inicio, duracion, precio, costo_sala, idTeatro
        $consultaModifica = "UPDATE funcion SET nombre = " . "'" . $this->getNombre() . "',fecha = " . $this->getFecha() . ",horario_inicio = " . $this->getHorarioInicio() . ",duracion = " . $this->getDuracion() . ",precio = " . $this->getPrecio() . ",costo_sala = '" . $this->getCostoSala() . "',id_teatro = '" . $this->getObjTeatro()->getIdTeatro() . "' WHERE id = " . $this->getId();

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

    /**
     * Elimina una tupla a partir del id en la tabla funciones
     * @return boolean $resp
     */
    public function eliminar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if ($baseDatos->Iniciar()) {
            $consultaBorra = "DELETE FROM funcion WHERE id = " . $this->getId();

            if ($this->getId() != 0) {
                if ($baseDatos->Ejecutar($consultaBorra)) {
                    $resp = true;
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $resp;
    }
}
