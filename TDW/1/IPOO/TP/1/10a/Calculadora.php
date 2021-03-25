<?php
class Calculadora
{
    // Realizacion de una operacion en un calculadora
    // $num1 y $num2 son los numeros de la operacion

    private $num1;
    private $num2;

    public function __construct($num1, $num2)
    {
        // Metodo constructor de la clase Calculadora
        // float $num1, $num2
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function getNum1()
    {
        return $this->num1;
    }

    public function getNum2()
    {
        return $this->num2;
    }

    /**
     * Realiza la suma entre dos variables
     * @param float $num1
     * @param float $num2
     * @return float $resultado
     */
    public function sumar($num1, $num2)
    {
        // float $resultado
        $resultado = $this->getNum1() + $this->getNum2();
        return $resultado;
    }

    /**
     * Realiza la resta entre dos variables
     * @param float $num1
     * @param float $num2
     * @return float $resultado
     */
    public function restar($num1, $num2)
    {
        // float $resultado
        $resultado = $this->getNum1() - $this->getNum2();
        return $resultado;
    }

    /**
     * Realiza la multiplicacion entre dos variables
     * @param float $num1
     * @param float $num2
     * @return float $resultado
     */
    public function multiplicar($num1, $num2)
    {
        // float $resultado
        $resultado = $this->getNum1() * $this->getNum2();
        return $resultado;
    }

    /**
     * Realiza la division entre dos variables
     * @param float $num1
     * @param float $num2
     * @return float $resultado
     */
    public function dividir($num1, $num2)
    {
        // float $resultado
        $resultado = $this->getNum1() / $this->getNum2();
        return $resultado;
    }
}
