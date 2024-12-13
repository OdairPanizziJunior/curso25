<?php

//Descobrir se o número é primo ou não.

$numero = 9;
$limitador = $numero - 1;

for ($i = 0; $i <= $limitador; $i++){
    echo "i= $i<br>";
}


<html>
<head>
    <tittle>
        <h1>Checagem de Números Primos</h1>
    </tittle>
</head>
<body>
    <form action="" method="POST">
        <label>Digite um número:</label>
        <input type="number" name="number" />
        <input type="submit" value="Testar" />
    </form>

<?php 

$numero = $_POST['number'];
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
