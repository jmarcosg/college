<?php
class Edificio
{
    // Atributos
    private $direccionEdificio;
    private $objColeccionDepartamentos;
    private $objAdministrador;

    // Constructor
    public function __construct($direccionEdificio, $objColeccionDepartamentos, $objAdministrador)
    {
        $this->direccion = $direccionEdificio;
        $this->departamentos = $objColeccionDepartamentos;
        $this->administrador = $objAdministrador;
    }

    // Observadoras
    public function getDireccionEdificio()
    {
        return $this->direccion;
    }

    public function getObjColeccionDepartamentos()
    {
        return $this->departamentos;
    }

    public function getObjAdministrador()
    {
        return $this->administrador;
    }

    // Modificadoras
    public function setDireccion($direccionEdificio)
    {
        $this->direccion = $direccionEdificio;
    }

    public function setDepartamentos($objColeccionDepartamentos)
    {
        $this->departamentos = $objColeccionDepartamentos;
    }

    public function setAdministrador($objAdministrador)
    {
        $this->administrador = $objAdministrador;
    }

    // Metodos
    public function darInmueblesDisponiblesParaAlquiler($unTipoInmueble, $costoMensual)
    {
        $inmueblesDisponibles = [];
        $inmuebles = $this->getObjColeccionDepartamentos();
        $i = 0;
        $inmueble = $inmuebles[$i];

        while ($inmueble->getCostoMensual() <= $costoMensual && $i < count($inmuebles)) {
            if ($inmueble->getObjInquilino() == null && $inmueble->getTipoInmueble() == $unTipoInmueble) {
                array_push($inmueblesDisponibles, $inmueble);
            }
            $i++;
            $inmueble = $inmuebles[$i];
        }

        return $inmueblesDisponibles;
    }

    public function registrarAlquilerInmueble($objInmueble, $objPersona)
    {
        $registroExitoso = false;

        if ($this->verficarAlquileresEnPiso($objInmueble->getNumeroPiso() - 1)) {
            $inmuebles = $this->getObjColeccionDepartamentos();
            $i = 0;

            while ($i < count($inmuebles)) {
                if ($inmuebles[$i]->getCodigoReferencia() == $objInmueble->getCodigoReferencia() && $inmuebles[$i]->getObjInquilino() == null) {
                    $inmuebles[$i]->setInquilino($objPersona);
                    $registroExitoso = true;
                    $i = count($inmuebles);
                }
                $i++;
            }
        }

        return $registroExitoso;
    }

    public function verficarAlquileresEnPiso($numPiso)
    {
        $pisoLleno = true;
        $inmuebles = $this->getObjColeccionDepartamentos();
        $i = 0;

        while ($inmuebles[$i]->getNumeroPiso() < $numPiso) {
            $i++;
        }

        while ($inmuebles[$i]->getNumeroPiso() == $numPiso && $pisoLleno) {
            if ($inmuebles[$i]->getObjInquilino() == null) {
                $pisoLleno = false;
            }
            $i++;
        }
    }

    public function ordenarPisos()
    {
        $inmuebles = $this->getObjColeccionDepartamentos();
        $ordenado = false;
        $i = 0;
        $cantInmuebles = count($inmuebles);

        while ($i < $cantInmuebles && !$ordenado) {
            $ordenado = true;

            for ($j = 0; $j < $cantInmuebles - $i - 1; $j++) {
                if ($inmuebles[$j]->getNumeroPiso() > $inmuebles[$j + 1]->getNumeroPiso()) {
                    $posicionInmueble = $inmuebles[$j];
                    $inmuebles[$j] = $inmuebles[$j + 1];
                    $inmuebles[$j + 1] = $posicionInmueble;
                    $ordenado = false;
                }
            }
            $i++;
        }
        $this->setDepartamentos($inmuebles);
    }

    public function calcularCostoEdificio()
    {
        $costoTotal = 0;

        foreach ($this->getObjColeccionDepartamentos() as $inmueble) {
            if ($inmueble->getObjInquilino() != null) {
                $costoTotal += $inmueble->getCostoMensual();
            }
        }

        return $costoTotal;
    }

    public function inmueblesToString()
    {
        $mensaje = "";
        $inmuebles = $this->getObjColeccionDepartamentos();

        for ($i = 0; $i < count($inmuebles); $i++) {
            $mensaje .= $inmuebles[$i] . "\n";
        }

        return $mensaje;
    }

    public function __toString()
    {
        return "Direccion: " . $this->getDireccionEdificio() . "\n" .
        "Inmuebles: " . $this->inmueblesToString() . "\n" .
        "Administrador: \n" . $this->getObjAdministrador();
    }

}
