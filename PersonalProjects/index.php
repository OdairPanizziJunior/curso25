<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Primeiro Script PHP</title>
</head>
<body>
    <?php 
    $cumprimentos = ['', 
                    'Oi,',
                    'Olá,', 
                    'Eai,', 
                    'Salve,', 
                    'Como vai?,', 
                    'Saudações,', 
                    'Oi, tudo bem?,'];
    shuffle($cumprimentos);

    // PARTE DESTINADA A API ====================================================================
    // Site: https://developers.thecatapi.com/view-account/ylX4blBYT9FaoVd6OhvR?report=bOoHBz-8t
    
    // Chave da API da TheCatAPI
    $apiKey = 'live_DReFWJQ7z26k7V59Vf059jibSHTAInyiwppPy4Ujah6nhAnHQu9KCjbYGMYGOot9';

    // URL da API para obter uma imagem aleatória
    $url = 'https://api.thecatapi.com/v1/images/search';

    // Usando cURL para obter dados da API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-api-key: ' . $apiKey));
    $response = curl_exec($ch);
    curl_close($ch);

    // Convertendo a resposta JSON em um array
    $data = json_decode($response, true);
    $catImageUrl = $data[0]['url']; // Obtendo a URL da imagem e jogando para dentro da variável
    // =========================================================================================
    ?>
        
    <div class="container"> 
        <h1 class="text-center"><?php echo $cumprimentos[0]?> Bem-Vindo ao meu site!</h1>
    </div>

    <div class="text-center">
        <h3 class="text-muted">Veja um gatinho fofinho:</h3>
        <img src="<?php echo $catImageUrl; ?>" alt="Gato Aleatório" class="img-fluid" width="300" height="300">
    </div>

    <div class="lead text-center"> 
        <br>
        <button class="btn btn-primary" name="button" onclick="window.location.reload();">Quero outra Foto!</button>
        <br>
        <br>
    </div>

    <p class="small lead text-center text-muted">
        <?php
            $nome = "Odair Panizzi Júnior";
            echo "Criado por " . $nome . ".";
        ?>
    </p>

</body>
</html>