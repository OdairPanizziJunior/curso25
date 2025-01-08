<?php
// 1 - Recriar o exercício da tabuada usando funções.
// 2 - Encontrar os 10 primeiros números pares e os 10 primeiros ímpares
// 3 - Encontrar os 10 primeiros números primos, a partir do 10.
// 4 - Ordenar em ordem crescente o array [10, 5, 2, 30, 85, 14] (não usar funções nativas "asort", "usort" e "sort")

$numero = 10;

echo "Tabuada do número " . $numero . "<br><br>";

function tabuada($numero){
    for ($i = 0; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "<li>$numero x $i = $resultado</li>";
    }
}

tabuada($numero);

echo "<br><br>";


$par = [];
$impar = [];

    for ($i = 0; $i < 20; $i++){
        if($i % 2 == 0){
            $par[] = $i;
      
        }else{
            $impar[] = $i;
        
        }
    }

echo "Números pares<br> " . implode(", " , $par);
echo "<br>";
echo "Números Impares<br> " . implode(", " , $impar);

?>