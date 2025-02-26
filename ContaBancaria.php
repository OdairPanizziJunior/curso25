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
//$nomeArquivo = "banco_do_brasil.txt";

//$arquivoTxt = new GerenciadorDeArquivo($nomeArquivo);
//$conta = new ContaBancaria($arquivoTxt);

//$conta->criarConta("Rafael", 150);
// $conta->depositar(10, 500);
// echo $conta->extrato(10);
//echo $conta->listarContas();

//$conta->pix(10,11,200);
$id = $_REQUEST["id"] ?? 0;

$sql = "SELECT * FROM conta_bancaria WHERE id = $id;";



$result = $conexao->query($sql);

$existeDados = $result->num_rows;

while ($registro = $result->fetch_assoc()){
    $linha = (object) $registro;
 
    echo "id: " . $linha->id . " | nome: " . $linha->nome_titular . " | saldo: " . $linha->saldo . "<br>";
}



