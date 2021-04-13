<?php
class Disquera
{
    /**
     * Atributos
     * obj $datosDuenioTienda
     * string $nombreTienda, $direccion, $estado
     * array $horaDesde, $horaHasta
     */
    private $datosDuenioTienda;
    private $nombreTienda;
    private $direccion;
    private $horaDesde;
    private $horaHasta;
    private $minutosFin;
    private $estado;

    // Constructor
    public function __construct($datosDuenioTienda, $nombreTienda, $direccion, $horaDesde, $horaHasta, $estado)
    {
        $this->duenio = $datosDuenioTienda;
        $this->nombre = $nombreTienda;
        $this->direccion = $direccion;
        $this->hhInicio = $horaDesde;
        $this->hhFin = $horaHasta;
        $this->estadoTienda = $estado;
    }

    // Observadoras
    public function getDatosDuenioTienda()
    {
        return $this->duenio;
    }

    public function getNombreTienda()
    {
        return $this->nombreTienda;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getHoraDesde()
    {
        return $this->hhInicio;
    }

    public function getHoraHasta()
    {
        return $this->hhFin;
    }

    public function getEstado()
    {
        return $this->estadoTienda;
    }

    // Modificadoras
    public function setDuenio($datosDuenioTienda)
    {
        $this->duenio = $datosDuenioTienda;
    }

    public function setNombre($nombreTienda)
    {
        $this->nombre = $nombreTienda;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setHhInicio($horaDesde)
    {
        $this->hhInicio = $horaDesde;
    }

    public function setHhFin($horaHasta)
    {
        $this->hhFin = $horaHasta;
    }

    public function setEstadoTienda($estado)
    {
        $this->estadoTienda = $estado;
    }

    // Metodos
    /**
     * Separa una hora en formato string en horas y minutos
     */
    public function formatearHorario($hora)
    {
        /**
         * Declaracion de variables
         * $horaFormateada
         */

        $horaFormateada = date("H:i", strtotime($hora[0] . ":" . $hora[1]));

        return $horaFormateada;
    }

    /**
     * Verifica, a partir de una hora ingresada, si la tienda esta abierta
     * @param int $hora
     * @param int $minutos
     * @return boolean $dentroHorario
     */
    public function dentroHorarioAtencion($hora, $minutos)
    {
        /**
         * Declaracion de variables
         * boolean $enHorario
         */

        // Inicializacion de variables
        $enHorario = false;

        if ($hora >= hhInicio && $hora <= hhInicio) {
            if ($minutos >= mmInicio && $minutos <= mmInicio) {
                if ($hora >= hhFin && $hora <= hhFin) {
                    if ($minutos >= mmFin && $minutos <= mmFin) {
                        $enHorario = true;
                    }
                }
            }
        }

        return $enHorario;
    }

    /**
     * Dada una hora y minutos corrobora que se encuentra dentro del horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura.
     * @param int $hora
     * @param int $minutos
     * @return boolean $tiendaAbierta
     */
    public function abrirDisquera($hora, $minutos)
    {
        /**
         * Declaracion de variables
         * boolean $tiendaAbierta
         */

        // Inicializacion de variables
        $tiendaAbierta = false;

        if ($hora >= hhInicio && $hora <= hhInicio) {
            if ($minutos >= mmInicio && $minutos <= mmInicio) {
                if ($hora >= hhFin && $hora <= hhFin) {
                    if ($minutos >= mmFin && $minutos <= mmFin) {
                        $tiendaAbierta = true;
                    }
                }
            }
        }

        return $tiendaAbierta;
    }

    /**
     * Dada una hora y minutos corrobora que se encuentra fuera del horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
     * @param int $hora
     * @param int $minutos
     * @return boolean $tiendaCerrada
     */
    public function cerrarDisquera($hora, $minutos)
    {
        /**
         * Declaracion de variables
         * boolean $tiendaCerrada
         */

        // Inicializacion de variables
        $tiendaCerrada = false;

        if ($hora <= hhInicio && $hora >= hhInicio) {
            if ($minutos <= mmInicio && $minutos >= mmInicio) {
                if ($hora <= hhFin && $hora >= hhFin) {
                    if ($minutos <= mmFin && $minutos >= mmFin) {
                        $tiendaCerrada = true;
                    }
                }
            }
        }

        return $tiendaCerrada;
    }

    /**
     * Cambia el estado de la tienda de "cerrada" a "abierta" o viceversa
     * @param boolean $estado
     */

}
