<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checagem de Números Primos</title>
   <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .form {
            max-width: 550px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 30px !important;
            font-weight: bold;
            color: #007bff;
        }
        h2 {
            font-size: 20px !important;;
            color: #6c757d;
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1rem;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="form">
        <h1>Quer saber se o número é Primo?</h1>
        <h2>Digite-o e clique em testar</h2>
        <form action="" method="POST">
            <input type="number" name="number" required placeholder="Digite o número aqui" />
            <input type="submit" value="Testar" />
        </form>
    </div>
    <br>
    <div class="form">
        <?php
        //Descobrir se o número é primo ou não.
        // 3 maneiras do iterador I
        // $i = $i + 1;
        // $i += 1;
        // $i++;

        $numero = $_POST['number'] ?? null;

        if($numero <= 1) {
            echo "Números menores ou iguais a 1 não são considerados primos.";    
            exit;
        }

        $divisores = 0;

        for($i = 2; $i < $numero; $i++){
            if ($numero % $i == 0){ //$i é o divisor (dividindo sempre por 2)
                echo "O número " . $numero . " pode ser divido por $i.<br />"; //quais números dividiram $numero. 
                $divisores++;
                } 
            }
            if ($divisores == 0) {
                echo "O número " .$numero . " é primo!";
            } else {
                echo "Portanto " .$numero . " não é primo!<br> Ele possui $divisores divisor(es) além de 1 e ele mesmo.";
            }
        ?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>