<?php

//Constantes (sempre maiúscula, com _ se necesário)
const CPF = '01234567890';
const VEL_LUZ = '320k\s2'; 

//tipos de dados primitivos do PHP.
$inteiro = 2;
$string = "Um texto qualquer";
$nomePessoa = "Odair"; //style guide Camel Case
$nome_pessoa = "Odair"; //style guide Snake Case
$float = 2.5;
$double = 2.5468;
$char = 'a';

//Obs: o PHP já entende o tipo de dado colocado, então não necessáriamente precisa declarar o tipo. 

//tipos de dados estruturais (Objeto ou Classe)
$array = array(); //versões antigas do PHP 5.0 - 7.0
$array_short = []; //versões mais novas do PHP 7.0+
$objeto = new stdClass(); //POO - OOP
$classe = new stdClass();

//Exemplo de uma Classe
class CanetaAzul { // nome do objeto
    // atributos e/ou propriedades
    public const PLASTICO = true;
    public const COR = "Azul";
    public $nome;
    public $tipoMaterial = "Plastico";
    public $dimensoes;
    public $tipo;

    // metodos e/ou funções (sempre no infinitivo)
    public function escrever(){

    }
}


$string = "<br/>Um texto qualquer";
echo "Olá <b><i>Mundo!</i></b>";
echo $string;
echo "</br>CPF: " . CPF;

$x = 10 + 10;
$soma = $x;
echo "</br>Soma: " . $soma;

?>