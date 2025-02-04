<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios de Reforço</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        
        h1{
            text-align: center;
        }

        h1:hover{
            color: blue;
        }
        h2{
            text-align:center;
            font-size: 17px;
        }
        h3{
            text-align: left;
            font-size: 15px;
            margin-left: 10px;
        }
        .container {
            text-align: center;
        }

        input[type="number"]::-webkit-inner-spin-button, 
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            width: 10%; 
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1rem;
            -webkit-appearance: none; 
            -moz-appearance: textfield; 
            appearance: none; 
        }
        button {
            width: 5%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 17px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .resultado{
            text-align: center;
        }
        .enunciado{
            text-align: left; 
            margin-left: 45px;
        }
    </style>
</head>
<body>
    <h1>Exercícios de Reforço</h1>
    <h2>Começe digitando um número</h2>

    <div class="container">
        <form action="" method="POST">
            <input class="area" type="number" name="number" placeholder="digite um número">
            <button type="submit" title="Clique para testar">Testar</button>
        </form>
    </div>
    
        <?php
        // 1 - Recriar o exercício da tabuada usando funções.
        // 2 - Encontrar os 10 primeiros números pares e os 10 primeiros ímpares
        // 3 - Encontrar os 10 primeiros números primos, a partir do 10.
        // 4 - Ordenar em ordem crescente o array [10, 5, 2, 30, 85, 14] (não usar funções nativas "asort", "usort" e "sort")
        $numero = $_POST['number'] ?? null;
            
            if ($numero == null){
                exit;
            }
        ?>

    <div class="resultado">
        <?php
            echo "Número digitado: " . $numero;
        ?>
    </div>
    
    <!-- TABUADA - 1: Recriar o exercício da tabuada usando funções. -->
    <h3>1: Recriar o exercício da tabuada usando funções.</h3>
    
    <div class="enunciado">
        <?php
            echo "Tabuada do número " . $numero . " até o 10. <br><br>";
            function tabuada($numero){
                for ($i = 0; $i <= 10; $i++) {
                    $resultado = $numero * $i;
                    echo "<li>$numero x $i = $resultado</li>";
                }
            }
                tabuada($numero);
            echo "<br>";
        ?>
    </div>
    <!-- FIM TABUADA -->
    
    <!-- PAR OU ÍMPAR - 2: Encontrar os 10 primeiros números pares e os 10 primeiros ímpares -->
    <h3>2: Encontrar os 10 primeiros números pares e os 10 primeiros ímpares</h3>
    
    <div class="enunciado">
        <?php  
            //echo "<br>Quais são os 10 primeiros números pares começando do zero?<br><br>";

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
            echo "<br>Números Impares<br> " . implode(", " , $impar);
            echo "<br>";
            echo "<br>";
        ?>
    </div>    
    <!-- FIM PAR OU ÍMPAR -->
        
    <!-- BÔNUS PAR OU ÍMPAR -->
    <h4 class="enunciado">Bônus!</h4>
    
    <div class="enunciado">
        <?php
            for ($i = $numero; $i < ($numero + 20); $i++){
                if($i % 2 == 0){
                    $parX[] = $i; 
                }else{
                    $imparX[] = $i;
                }
            }
            echo "Desafio: os próximos 10 pares à partir do " . $numero . ", ou seja, de " .  $numero . " até " . $numero+20;
            echo "<br><br>Números pares<br> " . implode(", " , $parX);
            echo "<br><br>E os próximos 10 ímpares?";
            echo "<br><br>Números Ímpares<br> " . implode(", " , $imparX);
            echo "<br>";
            echo "<br>";
        ?>    
    </div>
    <!-- FIM BÔNUS PAR OU ÍMPAR -->
    
    <!-- NÚMEROS PRIMOS - 3: Encontrar os 10 primeiros números primos, a partir do 10 -->
    <h3>3: Encontrar os 10 primeiros números primos, a partir do 10.</h3>
    
    <div class="enunciado">
        <?php
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
            echo "<br>";
            echo "<br>";
        ?>
    </div>
    <!-- FIM NÚMEROS PRIMOS -->
    
    <!-- NÚMEROS PRIMOS - 3: Encontrar os 10 primeiros números primos, a partir do 10 -->
    <h3>4: Ordenar em ordem crescente o $array=[10, 5, 2, 30, 85, 14]. Obs: não usar funções nativas "asort", "usort" e "sort".</h3>
    
    <div class="enunciado">
        <?php 
             echo "Array desordenado <br> [10] [5] [2] [30] [85] [14]";

             $array = [10, 5, 2, 30, 85, 14];
             //         0, 1, 2,  3,  4,  5
 
             $tam = count($array) -1; // 6 - 1 = 5
 
             for ($i = 0; $i < $tam/2; $i++ ) {       
                 for ($j = $tam+1/2; $j > 0; $j--) {
                     $anterior = $j -1;
 
                     if ($array[$anterior] > $array[$j]) {
                         $temp = $array[$anterior];
                         $array[$anterior] = $array[$j];
                         $array[$j] = $temp;
                     }
                 }
 
                 if ($array[$i] < $array[$j]) {
                     $temp = $array[$i];
                     $array[$i] = $array[$j];
                     $array[$j] = $temp;
                 }
             }
 
             echo "<br><br>Array Ordenado<br>";
             foreach($array as $resultado){
                 echo "[$resultado] ";
             }
        ?>
    <!-- FIM ORDENAR --> 
    <br><br><br>
</body>
</html>