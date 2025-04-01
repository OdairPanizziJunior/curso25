<?php

require_once "./Database.php";

class ContaBancaria {
    public string $titular = "";
    public string $destinatario = "";
    public float $saldo = 0;

    private $bancoDeDados;
    
    public function __construct($bancoDeDados)
    {
        $this->bancoDeDados = $bancoDeDados;
    }

    private function processarDadosVisualizacao($dados)
    {
        foreach ($dados as $idx => $linha) {
            echo "Id: $linha->id Nome: $linha->nome_titular Saldo: $linha->saldo";   
            echo "<br>";
        }
    }

    private function obterDadosConta($idConta, $msg = "") {
        $sql = "SELECT * FROM conta_bancaria WHERE id = '$idConta'";

        return $this->bancoDeDados->execQuery($sql, $msg);
    }

    public function criarConta(string $nome, float $valor = 0.0)
    {
        $msg = "Erro ao criar conta";
        $sql = "INSERT INTO conta_bancaria (nome_titular, saldo) VALUES ('$nome', $valor)";
        $idConta = $this->bancoDeDados->execQuery($sql, $msg);
        $this->extrato($idConta);
    }

    public function sacar($idConta, $valor)
    {
        if (empty($idConta)) {
            return "Erro, id da conta está em branco ou é inváldo!";
        }

        $msg = "Erro ao obter a conta. Conta inexistente. verifique o ID informado.";
        $dadosConta = $this->obterDadosConta($idConta, $msg);

        $saldo = $dadosConta[0]->saldo ?? 0;

        if ($saldo <= 0 || $valor > $saldo) {
            throw new Exception("Saldo indísponivel.555555555");
        }

        $saldoAtual = $saldo - $valor;

        $sql = "UPDATE conta_bancaria SET saldo=$saldoAtual WHERE id='$idConta'";
        $this->bancoDeDados->execQuery($sql);

        return $saldoAtual;
    }

    public function depositar($idConta, $valor)
    {
        if (empty($idConta)) {
            return "Erro, id da conta está em branco ou é inváldo!";
        }

        $msg = "Conta não encontrada, não foi possível efetuar o depósito. Verifique o ID informado.";
        $dadosConta = $this->obterDadosConta($idConta, $msg);

        $saldo = $dadosConta[0]->saldo;
        $saldoAtual = $saldo + $valor;

        $msg = "Erro ao atualizar saldo.";
        $sql = "UPDATE conta_bancaria SET saldo=$saldoAtual WHERE id='$idConta'";
        $this->bancoDeDados->execQuery($sql, $msg);

        return $saldoAtual;
    }

    public function pix($contaOrigem, $contaDestino, $valor)
    {
        $this->sacar($contaOrigem, $valor);
        $this->depositar($contaDestino, $valor);
    }

    public function listarContas()
    {
        $sql = "SELECT * FROM conta_bancaria;";
        $dados = $this->bancoDeDados->execQuery($sql);
        
        return $dados;

        $this->processarDadosVisualizacao($dados);
    }

    public function extrato($idConta) {

        if (empty($idConta)) {
            throw new Exception("Erro, id da conta está em branco ou é inváldo!");
        }

        $sql = "SELECT * FROM conta_bancaria WHERE id = '$idConta'";
        $dados = $this->bancoDeDados->execQuery($sql);
        $this->processarDadosVisualizacao($dados);
    }
}

try {
    // Parametros URL
    $id = $_REQUEST["id"] ?? 0;
    $idDestino = $_REQUEST["idDestino"] ?? 0;
    $valor = $_REQUEST["valor"] ?? 0;
    $saldoMin = $_REQUEST["saldoMin"] ?? 0;
    $saldoMax = $_REQUEST["saldoMax"] ?? 0;
    $nomeTitular = $_REQUEST["nomeTitular"] ?? "";
    
    $conta = new ContaBancaria($bancoDeDados);
    echo $conta->pix($id, $idDestino, $valor);
    // echo $conta->listarContas();
    setResponseApi($conta->listarContas());
} catch (Exception $erro) {
    echo $erro->getMessage();
    exit;
}

function setResponseApi($dados) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($dados);
    exit;
}