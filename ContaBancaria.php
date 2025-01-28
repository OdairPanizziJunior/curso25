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


    public function sacar(){}
    public function depositar(){}
    public function pix(){}
    public function verSaldo(){}
    public function estrato(){}

}


