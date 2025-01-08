<?php
// 1 - Recriar o exercício da tabuada usando funções.
// 2 - Encontrar os 10 primeiros números pares e os 10 primeiros ímpares
// 3 - Encontrar os 10 primeiros números primos, a partir do 10.
// 4 - Ordenar em ordem crescente o array [10, 5, 2, 30, 85, 14] (não usar funções nativas "asort", "usort" e "sort")

$numero = 50;

echo "Você digitou o número: " . $numero;

// TABUADA - 1: Recriar o exercício da tabuada usando funções.
echo "<br><br>Tabuada do número " . $numero . " até o 10. <br><br>";

function tabuada($numero){
    for ($i = 0; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "<li>$numero x $i = $resultado</li>";
    }
}

tabuada($numero);

// FIM TABUADA

// PAR OU ÍMPAR - 2: Encontrar os 10 primeiros números pares e os 10 primeiros ímpares
echo "<br>Quais são os 10 primeiros números pares começando do zero?<br><br>";

for ($i = 0; $i < 20; $i++){
    if($i % 2 == 0){
        $par[] = $i; 
    }else{
        $impar[] = $i;
    }
}

echo "Números pares<br> " . implode(", " , $par);
echo "<br><br>E os 10 primeiros números ímpares começando do zero?";
echo "<br><br>Números Impares<br> " . implode(", " , $impar);

// FIM PAR OU ÍMPAR

// BÔNUS PAR OU ÍMPAR
for ($i = $numero; $i < ($numero + 20); $i++){
    if($i % 2 == 0){
        $parX[] = $i; 
    }else{
        $imparX[] = $i;
    }
}

echo "<br><br><br>Desafio: os próximos 10 pares à partir do " . $numero . ", ou seja, de " .  $numero . " até " . $numero+20;
echo "<br><br>Números pares<br> " . implode(", " , $parX);
echo "<br><br>E os próximos 10 ímpares?";
echo "<br><br>Números Ímpares<br> " . implode(", " , $imparX);

// FIM BÔNUS PAR OU ÍMPAR

// NÚMEROS PRIMOS - 3: Encontrar os 10 primeiros números primos, a partir do 10.

echo "<br><br>Quais são os 10 primeiros números primos do 10?<br><br>";

$inicio = 10; 
$qtdPrimos = 10; 
$primos = []; 

for ($numeroPrimo = $inicio; count($primos) < $qtdPrimos; $numeroPrimo++) {
    $divisores = 0; 

    for ($i = 2; $i < $numeroPrimo; $i++) {
        if ($numeroPrimo % $i == 0) { 
            $divisores++;
            break; 
        }
    }

    if ($divisores == 0) {
        $primos[] = $numeroPrimo; 
    }
}

echo "Os 10 primeiros números primos a partdir de $inicio são: " . implode(", ", $primos);

// FIM NÚMEROS PRIMOS

// ORDENAR  - 4: Ordenar em ordem crescente o array [10, 5, 2, 30, 85, 14] (não usar funções nativas "asort", "usort" e "sort")



// FIM ORDENAR

?>