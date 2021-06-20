<?php

class ObraTeatral extends Funcion
{
    private $autor;

    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->autor = "";
    }

    public function cargar($datosFuncionObraTeatral)
    {
        parent::cargar($datosFuncionObraTeatral);
        $this->setAutor($datosFuncionObraTeatral["autor"]);
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
        return "OBRA TEATRAL\n" . parent::__toString() . "Autor: " . $this->getAutor() . "\n";
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
        $consulta = "SELECT * FROM obra_teatral WHERE id = " . $id;
        $resp = false;

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                if ($row2 = $baseDatos->registro()) {
                    parent::buscar($id);
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

    /**
     * Lista todas las funciones de tipo obra teatral en el teatro que cumplan con la condicion recibida por parametro
     * Retorna un arreglo con todos los datos de las funciones de tipo obra teatral
     * @param String $condicion
     * @return $arregloObraTeatral[]
     */
    public function listar($condicion = "")
    {
        $arregloObraTeatral = null;
        $baseDatos = new BaseDatos();
        $consulta = "SELECT * FROM obra_teatral ";

        // Si la condicion recibida por parametero no esta vacia, arma un nuevo string para la consulta en la bd
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }

        // Le concateno a la consulta que ordene de forma ascendente con el id de las funciones de tipo obra teatral
        $consulta .= " ORDER BY id ";

        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                $arregloObraTeatral = [];
                while ($row2 = $baseDatos->registro()) { // Creo una nueva instancia obra teatral la cual pusheo al array que devuelvo
                    $objObraTeatral = new ObraTeatral();
                    $objObraTeatral->buscar($row2['id']);
                    array_push($arregloObraTeatral, $objObraTeatral);
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
        } else {
            $this->setMensajeOperacion($baseDatos->getError());
        }

        return $arregloObraTeatral;
    }

    /**
     * Inserta una nueva tupla en la tabla obra_teatral
     * @return boolean $resp
     */
    public function insertar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if (parent::insertar()) {
            $consultaInsertar = "INSERT INTO obra_teatral(id, autor)
            VALUES (" . parent::getId() . ", '" . $this->getAutor() . "')";

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
     * Modifica los values de una tupla en la tabla obra_teatral
     * @return boolean $resp
     */
    public function modificar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if (parent::modificar()) {
            $consultaModifica = "UPDATE obra_teatral SET autor = '" . $this->getAutor() . "WHERE id = " . parent::getId();

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
     * Elimina una tupla a partir del id de la funcion en la tabla obra_teatral
     * @return boolean $resp
     */
    public function eliminar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        if ($baseDatos->iniciar()) {
            $consultaBorra = "DELETE FROM obra_teatral WHERE id = " . parent::getId();

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
