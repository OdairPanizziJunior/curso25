<?php
// criar um algoritmo que simula o funcionamento de um calendário.
// variáveis: $data = '31/01/2025'
// Validar a data
// validar se o ano é bissexto
// Dica IF else

$data = '29/02/22024';  

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



<?php
// criar um algoritmo que simula o funcionamento de um calendário.
// variáveis: $data = '31/01/2025'
// Validar a data
// validar se o ano é bissexto
// Dica IF else

$data = '10-02-2024';

//explode a variável $data em partes separadas por /
$partes = explode('-', $data);

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

echo $data . " ok !";

//isso é para converter os dados em inteiro
$dia = (int)$dia;
$mes = (int)$mes;
$ano = (int)$ano;

if($dia < 1 )



/*
function validaFormatoData($data) {
    return preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $data);
}

list($dia, $mes, $ano) = explode('/', $data);

if (!checkdate((int)$mes, (int)$dia, (int)$ano)) {
    echo "A data $data não é válida no calendário!<br>";
    exit;
}

if (!validaFormatoData($data)) {
    echo "Formato inválido! Use o formato DD/MM/AAAA. <br>Você digitou:" . $data . ".<br>";
    exit;
} else{
    if($dia < 1 || $dia > 31){
        echo "O dia " . $dia . " não existe!<br>";
    }
    
    if($mes < 1 || $mes > 12){
        echo "O mês " . $mes . " não existe.<br>";
    }
    
    if($ano < 1){
        echo "O Ano " . $ano . " não existe.<br>";
    }
    echo "Data: " . $data;
    
}*/

