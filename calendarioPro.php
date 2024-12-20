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



