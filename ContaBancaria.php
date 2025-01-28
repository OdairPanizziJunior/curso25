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


    public function depositar(){}
    public function pix(){}
    public function verSaldo(){}
    public function estrato(){}

}


