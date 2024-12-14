<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Checagem de Números Primos</title>
</head>
<body>
    <h1>Resultado da Checagem</h1>

    <form action="" method="POST">
        <label>Digite um número:</label>
        <input type="number" name="number" required />
        <input type="submit" value="Testar" />
    </form>
<?php
//Descobrir se o número é primo ou não.
$numero = $_POST['number'];

if($numero <= 1) {
    echo "Números menores ou iguais a 1 não são considerados primos.";    
    exit;
}

$divisores = 0;

    for($i = 2; $i < $numero; $i++){
        if ($numero % $i == 0){ //$i é o divisor (dividindo sempre por 2)
        echo $numero . " pode ser divido por $i.<br />"; //quais números dividiram $numero. 
        $divisores++;
        } 
    }
    if ($divisores == 0) {
        echo "É primo!";
    } else {
        echo "Portanto " .$numero . " não é primo!<br> Ele possui $divisores divisor(es) além de 1 e ele mesmo.";
    }
    ?>

</body>
</html>