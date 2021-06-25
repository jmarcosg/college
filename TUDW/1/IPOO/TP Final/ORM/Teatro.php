<?php
include_once 'BaseDatos.php';

class Teatro
{
    //VARIABLES
    private $id;
    private $nombre;
    private $direccion;
    private $ciudad;
    private $coleccionFunciones;
    private $mensajeOperacion;

    // Constructor
    public function __construct()
    {
        $this->id = 0;
        $this->nombre = "";
        $this->direccion = "";
        $this->ciudad = "";
        $this->coleccionFunciones = [];
        $this->mensajeOperacion = "";
    }

    public function cargar($nombre, $direccion, $ciudad)
    {
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
        $this->setCiudad($ciudad);
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

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function getColeccionFunciones()
    {
        // if (count($this->coleccionFunciones) == 0) {
        $cine = new Cine();
        $musical = new Musical();
        $obraTeatral = new ObraTeatral();

        $condicion = ""; //id = '" . $this->getId() . "'
        $funcionesCine = $cine->listar($condicion);
        $funcionesMusical = $musical->listar($condicion);
        $funcionesObrasTeatral = $obraTeatral->listar($condicion);

        $coleccionFunciones = array_merge($funcionesMusical, $funcionesCine, $funcionesObrasTeatral); // Mergeo todas las colecciones en una sola
        $this->setColeccionFunciones($coleccionFunciones);
        //}

        return $this->coleccionFunciones;
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

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    public function setColeccionFunciones($coleccionFunciones)
    {
        $this->coleccionFunciones = $coleccionFunciones;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    // Metodos
    public function __toString()
    {
        return "\tID: " . $this->getId() . "\n" .
        "\tNombre: " . $this->getNombre() . "\n" .
        "\tDireccion: " . $this->getDireccion() . "\n" .
        "\tCiudad: " . $this->getCiudad() . "\n";
    }

    /* OPERACIONES EN BASE DE DATOS */
    /**
     * Busca y recupera los datos de una funcion de tipo obra teatral por id
     * @param int $id
     * @return boolean $resp
     */
    public function buscar($id)
    {
        $baseDatos = new BaseDatos();
        $consultaPersona = "SELECT * FROM teatro WHERE id = " . $id;
        $resp = false;

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consultaPersona)) {
                if ($row2 = $baseDatos->registro()) {
                    $this->setId($id);
                    $this->setNombre($row2['nombre']);
                    $this->setDireccion($row2['direccion']);
                    $this->setCiudad($row2['ciudad']);
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
     * Lista todas los teatros que cumplan con la condicion recibida por parametro
     * Retorna un arreglo con todos los datos de los teatros
     * @param String $condicion
     * @return $arregloTeatro[]
     */
    public function listar($condicion = "")
    {
        $arregloTeatro = null;
        $baseDatos = new BaseDatos();
        $consultaTeatro = "SELECT * FROM teatro ";

        // Si la condicion recibida por parametero no esta vacia, arma un nuevo string para la consulta en la bd
        if ($condicion != "") {
            $consultaTeatro = $consultaTeatro . ' WHERE ' . $condicion;
        }

        // Le concateno a la consulta que ordene de forma ascendente con el autor de las funciones de tipo obra teatral
        $consultaTeatro .= " ORDER BY id";

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consultaTeatro)) {
                $arregloTeatro = [];
                while ($row2 = $baseDatos->registro()) { // Creo una nueva instancia teatro la cual pusheo al array que devuelvo
                    $id = $row2['id'];
                    $nombre = $row2['nombre'];
                    $direccion = $row2['direccion'];
                    $ciudad = $row2['ciudad'];

                    $teatro = new Teatro();
                    $teatro->cargar($nombre, $direccion, $ciudad);
                    $teatro->setId($id);

                    array_push($arregloTeatro, $teatro);
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $arregloTeatro;
    }

    /**
     * Inserta una nueva tupla en la tabla teatro
     * @return boolean $resp
     */
    public function insertar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        $consulta_insertar = "INSERT INTO teatro(nombre, direccion, ciudad) VALUES ('" . $this->getNombre() . "','" . $this->getDireccion() . "','" . $this->getCiudad() . "')";

        if ($baseDatos->iniciar()) {
            if ($id = $baseDatos->devuelveIDInsercion($consulta_insertar)) {
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
     * Modifica los values de una tupla en la tabla teatro
     * @return boolean $resp
     */
    public function modificar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        $consultaModifica = "UPDATE teatro SET nombre = '" . $this->getNombre() . "', direccion = '" . $this->getDireccion() . "', ciudad = '" . $this->getCiudad() . "' WHERE id = " . $this->getId();

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consultaModifica)) {
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
     * Elimina una tupla a partir del id del teatro en la tabla teatro
     * @param $id
     * @return boolean $resp
     */
    public function eliminar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;
        $i = 0;

        if ($baseDatos->iniciar()) {
            $consultaBorra = "DELETE FROM teatro WHERE id = " . $this->getId();
            while ($resp && $i < count($this->getColeccionFunciones())) {
                $resp = $this->getColeccionFunciones()[$i]->eliminar();
                $i++;
            }
            if ($baseDatos->ejecutar($consultaBorra)) {
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
