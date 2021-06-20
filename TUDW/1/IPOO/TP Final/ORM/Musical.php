<?php

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

    public function cargar($datosFuncionMusical)
    {
        parent::cargar($datosFuncionMusical);
        $this->setDirector($datosFuncionMusical["director"]);
        $this->setCantPersonas($datosFuncionMusical["cantidad_personas"]);
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
        return "MUSICAL\n" . parent::__toString() . "Director: " . $this->getDirector() . "\n" .
        "Cantidad de personas en escena: " . $this->getCantidadPersonas() . "\n";
    }

    public function buscarCosto()
    {
        $costo = $this->getPrecio();
        $costo = parent::buscarCosto() * 1.12;

        return $costo;
    }

    /* OPERACIONES EN BASE DE DATOS */
    /**
     * Busca y recupera los datos de una funcion de tipo musical por id
     * @param int $id
     * @return boolean $resp
     */
    public function buscar($id)
    {
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM musical WHERE id = " . $id;
        $resp = false;

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                if ($row2 = $baseDatos->registro()) {
                    parent::buscar($id);
                    $this->setDirector($row2['director']);
                    $this->setCantidadPersonas($row2['cantidad_personas']);
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }

        return $resp;
    }

    /**
     * Lista todas las funciones de tipo musical en el teatro que cumplan con la condicion recibida por parametro
     * Retorna un arreglo con todos los datos de las funciones de tipo musical
     * @param string $condicion
     * @return array $arregloMusical
     */
    public function listar($condicion = "")
    {
        $arregloMusical = null;
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM musical ";

        // Si la condicion recibida por parametero no esta vacia, arma un nuevo string para la consulta en la bd
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }

        // Le concateno a la consulta que ordene de forma ascendente con el genero de las funciones de tipo cine
        $consulta .= " ORDER BY id ";

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                $arregloMusical = [];
                while ($row2 = $baseDatos->Registro()) { // Creo una nueva instancia musical la cual pusheo al array que devuelvo
                    $objMusical = new Musical();
                    $objMusical->buscar($row2['id']);
                    array_push($arregloMusical, $objMusical);
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }

        return $arregloMusical;
    }

    /**
     * Inserta una nueva tupla en la tabla musical
     * @return boolean $resp
     */
    public function insertar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if (parent::insertar()) {
            $consultaInsertar = "INSERT INTO musical(id, director, cantidad_personas)
            VALUES (" . parent::getId() . ", '" . $this->getDirector() . "', " . $this->getCantidadPersonas() . ")";

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
            $consultaModifica = "UPDATE musical SET director = '" . $this->getDirector() . "', cantidad_personas = " . $this->getCantidadPersonas() . "WHERE id = " . parent::getId();

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
     * Elimina una tupla en la tabla musical
     * @return boolean $resp
     */
    public function eliminar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if ($baseDatos->iniciar()) {
            $consultaBorra = "DELETE FROM musical WHERE id = " . parent::getId();

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
