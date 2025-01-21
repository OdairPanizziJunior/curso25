<?php

class Calculadora{
    public $valor1 = 0;
    public $valor2 = 0;
    public $operador = '';
    public $resultado = 0;

    public function somar($valor1, $valor2){
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
        $this->operador = ' + ';
        $this->resultado = $this->valor1 + $this->valor2;
        return $this->__toString();
    }

    public function subtrair($valor1, $valor2){
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
        $this->operador = ' - ';
        $this->resultado = $this->valor1 - $this->valor2;
        return $this->__toString();
    }

    public function multiplicar($valor1, $valor2){
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
        $this->operador = ' * ';
        $this->resultado = $this->valor1 * $this->valor2;
        return $this->__toString();
    }

    public function dividir($valor1, $valor2){
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
        $this->operador = ' / ';
        $this->resultado = $this->valor1 / $this->valor2;
        return $this->__toString();
    }

    public function __toString(){
        
        return 'O resultado de ' . $this->valor1 . $this->operador . $this->valor2 . ' é ' . $this->resultado .'.<br>';

    }
}
// Para somar
$calculadora = new Calculadora();
echo $calculadora->somar(10,10);
echo $calculadora->subtrair(10,10);
echo $calculadora->multiplicar(10,10);
echo $calculadora->dividir(10,10);