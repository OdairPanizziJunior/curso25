<?php

class ContaBancaria{

    public $titular = '';
    public $saldo = 0;
    public $destinatario = '';
    public $historico = [];


    /* Construtor que inicializa o Titular e saldo inicial */
    public function __construct($titular, $saldoInicial = 0) {
    $this->titular = $titular;
    $this->saldo = $saldoInicial;
}


    /*Sacar*/
    public function sacar($valor) {
    if ($valor > $this->saldo) {
        return "Saldo insuficiente para o saque de R$ $valor.";
    }
        $this->saldo -= $valor;
        $this->historico[] = "Saque de R$ $valor.";
        return "Você sacou R$ $valor.";
    }  

    /* Depositar dinheiro*/
    public function depositar($valor){
        $saldo = 0;
        $this->saldo =  + $valor;
        $this->historico[] = "Depósito de R$ " . $valor . ".";
        return "Você depositou R$ " . $valor . ".";
    }

    /* PIX */
    public function pix($valor, $destinatario) {
        if ($valor > $this->saldo) {
            return "Saldo insuficiente para realizar PIX de R$ $valor para $destinatario.";
        }
        $this->saldo -= $valor;
        $this->historico[] = "PIX de R$ $valor para $destinatario.";
        return "PIX de R$ $valor realizado para $destinatario.";
    }

    /* Saldo */
    public function verSaldo() {
        return "Saldo atual: R$ " . number_format($this->saldo, 2, ',', '.');
    }

    /* Extrato */
    public function extrato() {
        if (empty($this->historico)) {
            return "Nenhuma movimentação encontrada.";
        }
        return "Extrato:\n" . implode("\n", $this->historico);
    }
}


$conta = new ContaBancaria("Odair Panizzi", 1000);


$resultado = $conta->sacar(300);
echo $resultado . "\n";
$resultado = $conta->pix(100,"João");
echo $resultado . "\n";
$resultado = $conta->depositar(1000);
echo $conta->verSaldo() . "\n";
echo "<br>" . $conta->extrato() . "\n";
/*
// Tentando sacar um valor maior que o saldo
$resultado = $conta->sacar(800);
echo $resultado . "\n";*/


/*
echo $conta->depositar(500) . "\n";
echo $conta->sacar(300) . "\n";
echo $conta->pix(200, "João") . "\n";
echo $conta->verSaldo() . "\n";
echo $conta->extrato() . "\n";

*/


