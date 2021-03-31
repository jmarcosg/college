<?php
class Teatro
{
    private $funciones;
    private $nombre;
    private $direccion;

    public function __construct($nom, $dir)
    {
        $this->nombre = $nom;
        $this->direccion = $dir;
        $this->funciones = [
            0 => ["nombre" => "Romeo y Julieta", "precio" => 120],
            1 => ["nombre" => "El Lago de los Cisnes", "precio" => 150],
            2 => ["nombre" => "Hamlet", "precio" => 132],
            3 => ["nombre" => "Edipo Rey", "precio" => 145],
        ];
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getFunciones()
    {
        return $this->funciones;
    }

    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }

    public function setDireccion($dir)
    {
        $this->direccion = $dir;
    }

    public function existeFuncion($funcionBuscada)
    {
        $pos = -1;
        $i = 0;
        while ($i < count($this->funciones) && $pos == -1) {
            if ($this->funciones[$i]["nombre"] == $funcionBuscada) {
                $pos = $i;
            } else {
                $i++;
            }
        }
        return $pos;
    }

    public function cambiarFuncion($pos, $nuevoNombre, $nuevoPrecio)
    {
        $this->funciones[$pos]["nombre"] = $nuevoNombre;
        $this->funciones[$pos]["precio"] = $nuevoPrecio;
    }

    public function __toString()
    {
        return "Teatro: " . $this->nombre . "\n" . "Direccion: " . $this->direccion . "\n";
    }
}

//Test Teatro
$teatro = new Teatro("Village", "Yrigoyen 300");
echo $teatro;

print_r($teatro->getFunciones());
