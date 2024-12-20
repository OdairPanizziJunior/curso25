<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form method="POST">
        <label class="form-label mt-4">Digite uma Data</label>
        <input type="text" name="data" placeholder="DD/MM/AAAA" id="data">
        <button type="submit" class="btn btn-primary">Testar</button><br>
    </form>

<?php
    // criar um algoritmo que simula o funcionamento de um calendário.
    // variáveis: $data = '31/01/2025'
    // Validar a data
    // validar se o ano é bissexto
    // Dica IF else

    $data = $_POST['data'] ?? null;  

    
    if($data == null) {
        echo "Digite uma data para testar";    
        exit;
    }


    function validaFormatoData($data) {
        return preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $data);
    }

    if (!validaFormatoData($data)) {
        echo "Formato inválido, use o formato DD/MM/AAAA. <br>Você digitou: " . $data . ".<br>";
        exit;
    }

    list($dia, $mes, $ano) = explode('/', $data);

    if (!checkdate((int)$mes, (int)$dia, (int)$ano)) {
        echo "A data $data não é válida no calendário!<br>";
        exit;
    }
    echo "Data: " . $data;
    echo "<br>Muito bem!"
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>


