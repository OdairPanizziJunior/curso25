<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
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
        .container {
            text-align: center;
        }

        .area{
            width: 80px;
        }

        .validador{
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>CALENDÁRIO</h1>

    <div class="container">
        <form action="" method="POST">
            <label for="">Data</label>
            <input class="area" type="text" name="data" placeholder="dd/mm/aaaa">
            <button type="submit" title="Clique para validar a data">Testar</button>
        </form>
    </div>
    
        <?php
        // criar um algoritmo que simula o funcionamento de um calendário.
        // variáveis: $data = '31/01/2025'
        // Validar a data
        // validar se o ano é bissexto
        // Dica IF else

        $data = $_POST['data'] ?? null;

        //meses com 30 dias
        $meses30 = [4,6,9,11];

        //explode a variável $data em partes separadas por /
        $partes = explode('/', $data);

        //Validar se foi dividido em 3 partes separadas por /
        ?>
    
    <div class="validador">
        <?php
            if(count($partes) != 3){
                echo '<br>Formato de data Inválido ou não digitado';
                exit;
            }
      
        //colocando cada parte separada em um array
        $dia = $partes[0]; // essa é a primeira parte da explosão
        $mes = $partes[1]; // segunda
        $ano = $partes[2]; // terceira
        
        //se não for númerico e não for tamanho 2/4
        if(!is_numeric($dia) || strlen($dia) != 2){
            echo "<br>Dia inválido";
            exit;
        }
        if(!is_numeric($mes) || strlen($mes) != 2){
            echo "<br>Mês inválido";
            exit;
        }
        if(!is_numeric($ano) || strlen($ano) != 4){
            echo "<br>Ano inválido";
            exit;
        }
        
        echo "<br>" . $data . " - O formato da data está ok!<br>";

        //isso é para converter os dados em inteiro
        $dia = (int)$dia;
        $mes = (int)$mes;
        $ano = (int)$ano;
        
        if($dia < 1 || $dia > 31){
            echo "Dia inexistente >> " . $dia;
            exit;
        }
        if($mes < 1 || $mes > 12){
            echo "Mês inexistente >> " . $mes;
            exit;
        }
        
        //dentro da variável $mes, tem algum número do array $meses30?
        if(in_array($mes, $meses30) && $dia > 30){
            echo "Esse mês não tem 31 dias";
            exit;
        }
        
        if ($mes == 2) {
            $bissexto = ($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0);
            
            if ($dia > 29 || ($dia == 29 && !$bissexto)) {
                echo "Fevereiro em " . $ano . " não tem/teve " . $dia . " dias!";
                exit;
            }
        }
        ?>
    </div>
</body>
</html>
