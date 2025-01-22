<?php

class Calculadora{
    public $valor1 = 0;
    public $valor2 = 0;
    public $operador = '';
    public $resultado = 0;

    public function __construct($valor1, $valor2){
        $this->set($valor1, $valor2);
    }

    public function set($valor1, $valor2){
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    public function reset(){
        $this->valor1 = 0;
        $this->valor2 = 0;
        $this->operador = '';
        $this->resultado = 0;
    }

    public function somar(){
        $this->operador = ' + ';
        $this->resultado = $this->valor1 + $this->valor2;
        return $this->__toString();
    }

    public function subtrair(){
        $this->operador = ' - ';
        $this->resultado = $this->valor1 - $this->valor2;
        return $this->__toString();
    }

    public function multiplicar(){
        $this->operador = ' * ';
        $this->resultado = $this->valor1 * $this->valor2;
        return $this->__toString();
    }

    public function dividir(){
        if (empty($this->valor1) || empty($this->valor2)){
            return 'Não é possível dividir por zero!';
        }
        $this->operador = ' / ';
        $this->resultado = $this->valor1 / $this->valor2;
        return $this->__toString();
    }

    public function __toString(){
        if (empty($this->valor1) || empty($this->valor2)){
            return 'O resultado é :' .  $this->resultado . '.<br>';
        }

        return 'O resultado de ' . $this->valor1 . $this->operador . $this->valor2 . ' é ' . $this->resultado .'.<br>';

    }
}

$valor1 = 0; 
$valor2 = 10;

// Para somar
$calculadora = new Calculadora($valor1, $valor2);
echo $calculadora->somar();
echo $calculadora->set(20,20);
echo $calculadora->subtrair();
echo $calculadora->multiplicar();

echo $calculadora->set($valor1,$valor2);
echo $calculadora->somar();
$calculadora->reset();
echo $calculadora->somar();