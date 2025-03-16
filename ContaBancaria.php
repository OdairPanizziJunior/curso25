<?php

require_once "./GerenciadorDeArquivo.php";

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

    private function execQuery($sql, $msg = "Não foi possivel obter os dados.") {
        $sql = "SELECT * FROM conta_bancaria;";

        $dados = $this->bancoDeDados->executar($sql);

        if (empty($dados )) {
            echo $msg;
            exit;
        }
        
        return $dados;
    }

    private function processarDados($dados) {
        foreach ($dados as $idx => $linha) {
            echo "Id: $linha->id Nome: $linha->nome_titular Saldo: $linha->saldo";   
            echo "<br>";
        }
    }
    
    public function listarContas()
    {
        $sql = "SELECT * FROM conta_bancaria;";

        $dados = $this->execQuery($sql);

        $this->processarDados($dados);


        // $dados = $this->bancoDeDados->ler();
        
        // foreach ($dados as $idx => $conta) {

        //     $numConta = $conta['id'];
        //     $nome = $conta['nome'];
        //     $saldo = $conta['saldo'];

        //     echo "N° Conta: {$numConta} <br> Nome: {$nome} <br> Saldo: {$saldo}<br><br>";
        // }
    }

    private function gerarIdConta() {
        $idsConta = [];
        $dados = $this->bancoDeDados->ler();

        foreach($dados as $idx => $conta) {
            $idsConta[] = $conta['id'];
        }

        $proximoId  = array_reverse($idsConta);

        return $proximoId[0] + 1;

    }

    public function criarConta(string $nome, float $saldoInicial = 0.0)
    {
        $idConta = $this->gerarIdConta();
        $dados = $this->bancoDeDados->ler();

        $novaConta = [
            'id' => $idConta,
            'nome' => $nome,
            'saldo' => $saldoInicial,
        ];

        $dados[] = $novaConta;
        $this->bancoDeDados->escrever($dados);
    }

    public function sacar($idConta, $valor) {
        $dados = $this->bancoDeDados->ler();
        foreach ($dados as &$conta) {
            if ($conta['id'] === $idConta) {
                if ($conta['saldo'] >= $valor) {
                    $conta['saldo'] -= $valor;
                    $this->bancoDeDados->escrever($dados);
                    return true;
                }
                return false;
            }
        }
        return false;
    }

    public function depositar($idConta, $valor) {

        $dados = $this->bancoDeDados->ler();

        foreach ($dados as $idx => &$conta) {

            if ($conta['id'] === $idConta) {
                $conta['saldo'] += $valor;
                $this->bancoDeDados->escrever($dados);
                return true;
            }
        }
        return false;
    }

    public function pix($contaOrigem, $contaDestino, $valor) {

        $dados = $this->bancoDeDados->ler();

        foreach($dados as $idx => &$conta){
            if ($this->extrato($contaOrigem) < $valor){
                break;
            }

            if ($conta['id'] === $contaOrigem) {
                $conta['saldo'] -= $valor;
                $this->bancoDeDados->escrever($dados);
            }

            if ($conta['id'] === $contaDestino) {
                $conta['saldo'] += $valor;
                $this->bancoDeDados->escrever($dados);
            }
        }

        return false;
    }

    public function extrato($idConta) {

        $sql = "SELECT * FROM conta_bancaria WHERE id = '$idConta';";

        $dados = $this->execQuery($sql);

        $this->processarDados($dados);
    }

    //     $dados = $this->bancoDeDados->ler();
        
    //     foreach ($dados as $conta) {
    //         if ($conta['id'] === $idConta) {
    //             return $conta['saldo'];
    //         }
    //     }
        
    //     return null; 
    // }
}

$id = $_REQUEST["id"] ?? 0;
$saldoMin = $_REQUEST["saldoMin"] ?? 0;
$saldoMax = $_REQUEST["saldoMax"] ?? 0;
$nomeTitular = $_REQUEST["nomeTitular"] ?? "";


$conta = new ContaBancaria($bancoDeDados);
echo $conta->extrato($id);

exit;

// $nomeArquivo = "banco_do_brasil.txt";

// $bancoDeDados = new GerenciadorDeArquivo($nomeArquivo);
// $conta = new ContaBancaria($bancoDeDados);

// $conta->criarConta("Rafael", 150);
// // $conta->depositar(10, 500);
// // echo $conta->extrato(10);
// echo $conta->listarContas();

// print_r($bancoDeDados);

// $bancoDeDados->close();
// CRUD: Create Read Update Delete
// READ (ALL) -> READ ONLY (Filtros: id, email, cpf)


// http://localhost/curso_php_25/ContaBancaria.php?id=5
// http://localhost/curso_php_25/ContaBancaria.php?id=5&saldoMin=200&saldoMax=1000


$id = $_REQUEST["id"] ?? 0;
$saldoMin = $_REQUEST["saldoMin"] ?? 0;
$saldoMax = $_REQUEST["saldoMax"] ?? 0;
$nomeTitular = $_REQUEST["nomeTitular"] ?? "";

// WHERE 1=1 Facilita o uso de filtros adicionais ou consulta geral.
// $sql = "SELECT * FROM conta_bancaria";
$sql = "SELECT * FROM conta_bancaria WHERE 1=1";

if ($id > 0) {
    $sql .= " AND id = '$id'";
    // $sql = "SELECT * FROM conta_bancaria WHERE 1=1 AND id = 10"; 
}

if ($saldoMin > 0) {
    $sql .= " AND saldo >= $saldoMin";
}

if ($saldoMax > 0) {
    $sql .= " AND saldo <= $saldoMax";
}

if (!empty($nomeTitular)) {
    $sql .= " AND nome_titular LIKE '%$nomeTitular%'";
}

$sql .=";";

$result = $bancoDeDados->query($sql);

$existeDados = $result->num_rows;

if (!$existeDados) {
    echo "Não foi possivel obter os dados.";
    exit;
}

while ($registro = $result->fetch_assoc()) {
    $linha = (object) $registro;
    echo "Id: $linha->id Nome: $linha->nome_titular Saldo: $linha->saldo";   
    echo "<br>";
}