<?php
//Calculadora

$n1 = 10;
$n2 = 2;
$operador = "*";

if ($operador == "+"){
    echo "A soma de " . $n1 . " + " . $n2 . " é igual a " . ($n1 + $n2);
}elseif($operador == "-"){
    echo "A subtração de " . $n1 . " - " . $n2 . " é igual a " . ($n1 - $n2);
}elseif($operador == "*"){
    echo "A multiplicação de " . $n1 . " x " . $n2 . " é igual a " . ($n1 * $n2);
}elseif($operador == "/"){
    echo "A divisão de " . $n1 . " / " . $n2 . " é igual a " . ($n1 / $n2);
}else  {
    echo "Somente as operações: <br> + <br> - <br> * <br>/";
}