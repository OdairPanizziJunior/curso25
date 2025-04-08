<?php

$conexao = mysqli_connect("localhost", "odair", "3003", "curso25");

if(!$conexao){
    echo "Erro de conexão!" . PHP_EOL;
    echo "Erro de conexão!" . mysqli_connect_errno() . PHP_EOL;
    echo "Erro de conexão!" . mysqli_connect_error() . PHP_EOL;
    exit;
}