<?php
// criar um algoritmo que simula o funcionamento de um calendário.
// variáveis: $data = '31/01/2025'
// Validar a data
// validar se o ano é bissexto
// Dica IF else

$data = '29/02/1993';

//meses com 30 dias
$meses30 = [4,6,9,11];

//explode a variável $data em partes separadas por /
$partes = explode('/', $data);

//Validar se foi dividido em 3 partes separadas por /
if(count($partes) != 3){
    echo 'Formato de data Inválido';
    exit;
}

//colocando cada parte separada em um array
$dia = $partes[0]; // essa é a primeira parte da explosão
$mes = $partes[1]; // segunda
$ano = $partes[2]; // terceira

//se não for númerico e não for tamanho 2/4
if(!is_numeric($dia) || strlen($dia) != 2){
    echo "Dia inválido";
    exit;
}
if(!is_numeric($mes) || strlen($mes) != 2){
    echo "Mês inválido";
    exit;
}
if(!is_numeric($ano) || strlen($ano) != 4){
    echo "Ano inválido";
    exit;
}

echo $data . " - Formato de data ok!<br>";

//isso é para converter os dados em inteiro
$dia = (int)$dia;
$mes = (int)$mes;
$ano = (int)$ano;

if($dia < 1 || $dia > 31){
    echo "Dia inexistente!<br>";
    exit;
}
if($mes < 1 || $mes > 12){
    echo "Mês inexistente!<br>";
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

