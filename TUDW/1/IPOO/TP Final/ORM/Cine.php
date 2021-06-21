<?php
class Cine extends Funcion
{
    private $genero;
    private $paisOrigen;

    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->genero = "";
        $this->paisOrigen = "";
    }

    public function cargar($datosFuncionCine)
    {
        parent::cargar($datosFuncionCine);
        $this->setGenero($datosFuncionCine["genero"]);
        $this->setPaisOrigen($datosFuncionCine["pais_origen"]);
    }

    // Observadoras
    public function getGenero()
    {
        return $this->genero;
    }

    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    // Modificadoras
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }

    // Metodos
    public function __toString()
    {
        return "CINE\n" . parent::__toString() . "Genero: " . $this->getGenero() . "\n" .
        "Origen: " . $this->getPaisOrigen() . "\n";
    }

    /* OPERACIONES EN BASE DE DATOS */
    /**
     * Busca y recupera los datos de una funcion de tipo cine por id
     * @param int $id
     * @return boolean $resp
     */
    public function buscar($id)
    {
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM cine WHERE id = " . $id;
        $resp = false;

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                if ($row2 = $baseDatos->registro()) {
                    parent::buscar($id);
                    $this->setGenero($row2['genero']);
                    $this->setPaisOrigen($row2['pais_origen']);
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
     * Lista todas las funciones de tipo cine en el teatro que cumplan con la condicion recibida por parametro
     * Retorna un arreglo con todos los datos de las funciones de tipo cine
     * @param String $condicion
     * @return $arregloCine[]
     */
    public function listar($condicion = "")
    {
        $arregloCine = [];
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM cine ";

        // Si la condicion recibida por parametero no esta vacia, arma un nuevo string para la consulta en la bd
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }

        // Le concateno a la consulta que ordene de forma ascendente con el id de las funciones de tipo cine
        $consulta .= " ORDER BY id ";

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                $arregloCine = [];
                while ($row2 = $baseDatos->registro()) { // Creo una nueva instancia cine la cual pusheo al array que devuelvo
                    $objCine = new Cine();
                    $objCine->buscar($row2['id']);
                    array_push($arregloCine, $objCine);
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $arregloCine;
    }

    /**
     * Inserta una nueva tupla en la tabla cine
     * @return boolean $resp
     */
    public function insertar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if (parent::insertar()) {
            $consultaInsertar = "INSERT INTO cine(id, genero, pais_origen) VALUES
            (" . parent::getId() . ", '" . $this->getGenero() . "', '" . $this->getPaisOrigen() . "')";

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consultaInsertar)) {
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

    /**
     * Modifica los values de una tupla en la tabla cine
     * @return boolean $resp
     */
    public function modificar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if (parent::modificar()) {
            $consultaModifica = "UPDATE cine SET genero = '" . $this->getGenero() . "', pais_origen = '" . $this->getPaisOrigen() . "' WHERE id = " . parent::getId();

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consultaModifica)) {
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

    /**
     * Elimina una tupla en la tabla cine
     * @return boolean $resp
     */
    public function eliminar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if ($baseDatos->iniciar()) {
            $consultaBorra = "DELETE FROM cine WHERE id = " . parent::getId();

            if ($baseDatos->ejecutar($consultaBorra)) {
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
