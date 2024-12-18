<?php
// criar um algoritmo que simula o funcionamento de um calendário.
// variáveis: $data = '31/01/2025'
// Validar a data
// validar se o ano é bissexto
// Dica IF else

$data = '31/10/2025';

$dia = substr($data, 0, 2);
$mes = substr($data, 3, 2);
$ano = substr($data, 6, 4);

echo $mes;