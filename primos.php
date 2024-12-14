<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checagem de Números Primos</title>
    <style>
        div.form{
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form">    
        <h1>Quer saber se o número é Primo?</h1>
        <h2>Digite-o e clique em testar</h2>
        <form action="" method="POST">
            <input type="number" name="number" required />
            <input type="submit" value="Testar" />
        </form>
    </div>
    <br>
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