<?php

require_once "./DataBase.php";

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
    }

    private function gerarIdConta() {
        $idsConta = [];
        $dados = $this->bancoDeDados->listarContas() ?? []; 
    
        foreach ($dados as $conta) {
            $idsConta[] = $conta->id; // <-- Agora acessando como objeto
        }
    
        if (empty($idsConta)) {
            return 1; // Se não houver contas, começa pelo ID 1
        }
    
        return max($idsConta) + 1; // Pega o maior ID e soma 1
    }

    public function criarConta(string $nome, float $saldoInicial = 0.0){
        
        $sql = "INSERT INTO conta_bancaria (nome_titular, saldo) VALUES ('$nome', '$saldoInicial')";
        $this->bancoDeDados->escrever($sql);
    }

    public function sacar($idConta, $valor) {
        $dados = $this->bancoDeDados->listarContas();
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
        $sql = "UPDATE conta_bancaria SET saldo = saldo + $valor WHERE id = $idConta";  // Corrigido para somar o valor ao saldo
        return $this->bancoDeDados->escrever($sql);
    }

    public function pix($contaOrigem, $contaDestino, $valor) {

        $dados = $this->bancoDeDados->listarContas();

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
}

$id = $_REQUEST["id"] ?? 0;
$saldoMin = $_REQUEST["saldoMin"] ?? 0;
$saldoMax = $_REQUEST["saldoMax"] ?? 0;
$nomeTitular = $_REQUEST["nomeTitular"] ?? "";

$conta = new ContaBancaria($bancoDeDados);

echo "<h3>Listando todas as contas:</h3>";
$conta->listarContas();
echo "<hr>";

/*
$nome = "Zé da Manga"; 
$valor = 800;
echo "<h3>Criando nova conta para " . $nome . "</h3>";
$conta->criarConta($nome, $valor);
$conta->listarContas(); */

$nome = "Zé da Manga"; 
$valor = 800;
echo "<h3>Depositado nova conta para " . $nome . "</h3>";
$conta->depositar(5, 500); 
$conta->listarContas(); 
exit;




$sql = "SELECT * FROM conta_bancaria WHERE 1=1";

if ($id > 0) {
    $sql .= " AND id = '$id'";
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



