<?php
//Calculadora

$numero1 = 10;
$numero2 = 2;
$operador = "*";

if ($operador == "+"){
    echo "A soma de " . $numero1 . " + " . $numero2 . " é igual a " . ($numero1 + $numero2);
}elseif($operador == "-"){
    echo "A subtração de " . $numero1 . " - " . $numero2 . " é igual a " . ($numero1 - $numero2);
}elseif($operador == "*"){
    echo "A multiplicação de " . $numero1 . " x " . $numero2 . " é igual a " . ($numero1 * $numero2);
}elseif($operador == "/"){
    echo "A divisão de " . $numero1 . " / " . $numero2 . " é igual a " . ($numero1 / $numero2);
}else  {
    echo "Somente as operações: <br> + <br> - <br> * <br>/";
}