<?php

require_once "./GerenciadorDeArquivo.php";

require_once "./Conexao.php";

class ContaBancaria {
    public string $titular = "";
    public string $destinatario = "";
    public float $saldo = 0;

    private GerenciadorDeArquivo $arquivoTxt;
    
    public function __construct(GerenciadorDeArquivo $arquivoTxt)
    {
        $this->arquivoTxt = $arquivoTxt;
    }
    
    public function listarContas()
    {
        $dados = $this->arquivoTxt->ler();
        
        foreach ($dados as $idx => $conta) {

            $numConta = $conta['id'];
            $nome = $conta['nome'];
            $saldo = $conta['saldo'];

            echo "N° Conta: {$numConta} <br> Nome: {$nome} <br> Saldo: {$saldo}<br><br>";
        }
    }

    private function gerarIdConta() {
        $idsConta = [];
        $dados = $this->arquivoTxt->ler();

        foreach($dados as $idx => $conta) {
            $idsConta[] = $conta['id'];
        }

        $proximoId  = array_reverse($idsConta);

        return $proximoId[0] + 1;

    }

    public function criarConta(string $nome, float $saldoInicial = 0.0)
    {
        $idConta = $this->gerarIdConta();
        $dados = $this->arquivoTxt->ler();

        $novaConta = [
            'id' => $idConta,
            'nome' => $nome,
            'saldo' => $saldoInicial,
        ];

        $dados[] = $novaConta;
        $this->arquivoTxt->escrever($dados);
    }

    public function sacar($idConta, $valor) {
        $dados = $this->arquivoTxt->ler();
        foreach ($dados as &$conta) {
            if ($conta['id'] === $idConta) {
                if ($conta['saldo'] >= $valor) {
                    $conta['saldo'] -= $valor;
                    $this->arquivoTxt->escrever($dados);
                    return true;
                }
                return false;
            }
        }
        return false;
    }

    public function depositar($idConta, $valor) {

        $dados = $this->arquivoTxt->ler();

        foreach ($dados as $idx => &$conta) {

            if ($conta['id'] === $idConta) {
                $conta['saldo'] += $valor;
                $this->arquivoTxt->escrever($dados);
                return true;
            }
        }
        return false;
    }

    public function pix($contaOrigem, $contaDestino, $valor) {

        $dados = $this->arquivoTxt->ler();

        foreach($dados as $idx => &$conta){
            if ($this->extrato($contaOrigem) < $valor){
                break;
            }

            if ($conta['id'] === $contaOrigem) {
                $conta['saldo'] -= $valor;
                $this->arquivoTxt->escrever($dados);
            }

            if ($conta['id'] === $contaDestino) {
                $conta['saldo'] += $valor;
                $this->arquivoTxt->escrever($dados);
            }
        }

        return false;
    }

    public function extrato($idConta) {
        $dados = $this->arquivoTxt->ler();
        
        foreach ($dados as $conta) {
            if ($conta['id'] === $idConta) {
                return $conta['saldo'];
            }
        }
        
        return null; 
    }
}
// $nomeArquivo = "banco_do_brasil.txt";

// $arquivoTxt = new GerenciadorDeArquivo($nomeArquivo);
// $conta = new ContaBancaria($arquivoTxt);

// $conta->criarConta("Rafael", 150);
// // $conta->depositar(10, 500);
// // echo $conta->extrato(10);
// echo $conta->listarContas();

// print_r($conexao);

// $conexao->close();
// CRUD: Create Read Update Delete
// READ (ALL) -> READ ONLY (Filtros: id, email, cpf)


// closure != (<>) clojure

$fnAjustarWhere = function ($sql) {
    $sqlAjustado = "";

    // ... criar a logica

    return $sqlAjustado;
};

// http://localhost/curso_php_25/ContaBancaria.php?id=5
// http://localhost/curso_php_25/ContaBancaria.php?id=5&saldoMin=200&saldoMax=1000
$id = $_REQUEST["id"] ?? 0;
$saldoMin = $_REQUEST["saldoMin"] ?? 0;
$saldoMax = $_REQUEST["saldoMax"] ?? 0;
$nomeTitular = $_REQUEST["nomeTitular"] ?? "";

$sql = "SELECT * FROM conta_bancaria";

if ($id > 0) {
    $sql .= " WHERE id = $id";
}

// SELECT * FROM conta_bancaria and saldo <= $saldo;

if ($saldo > 0) {
    // SELECT * FROM conta_bancaria WHERE id = $id and saldo <= $saldo;
    $sql .= $fnAjustarWhere($sql);
    $sql .= " and saldo <= $saldo";
    // $sql = $sql . " and saldo <= $saldo";
}

if (!empty($nomeTitular)) {
    $sql .= " and nome_titular LIKE '%$nomeTitular%'";
}

// SELECT * FROM conta_bancaria WHERE id = $id and saldo <= $saldo
// SELECT * FROM conta_bancaria WHERE id = $id and saldo <= $saldo;
$sql .=";";

$result = $conexao->query($sql);

$existeDados = $result->num_rows;

if (!$existeDados) {
    echo "Não foi possivel obter os dados.";
    exit;
}

while ($registro = $result->fetch_assoc()) {
    $linha = (object) $registro;
    //  $linha->id <= $linha["id"]

    echo "Id: $linha->id Nome: $linha->nome_titular Saldo: $linha->saldo";
    
    echo "<br>";
}