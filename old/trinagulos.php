<?php

$ladoA = 8;
$ladoB = 10;
$ladoC = 10;

if((($ladoA + $ladoB) < $ladoC) || (($ladoB + $ladoC) < $ladoA) || (($ladoC + $ladoA) < $ladoB)) {
    echo "Não é um triângulo";
}elseif($ladoA == $ladoB && $ladoB == $ladoC){
    echo "Isto é um triândulo Equilatero!";
}elseif($ladoA == $ladoB || $ladoA == $ladoC || $ladoB == $ladoC){
    echo "Isto é um triândulo Isósceles!";
}else{
    echo "Isto é um triândulo Escaleno!";
}