<?php

require_once "./Conexao.php";

class Database {

    private $conexao;
    
    public function __construct($conexao)
    {
        $this->conexao= $conexao;
    }
    
    public function fecharConexao()
    {
        $this->conexao->close();
    }

    private function executar($sql)
    {
        $dados = [];

        $isCreate = str_contains($sql, "INSERT");
        $isUpdate = str_contains($sql, "UPDATE");

        $result = $this->conexao->query($sql);
        
        if ($isCreate) {
            return $this->conexao->insert_id;
        }

        if ($isUpdate) {
            return $this->conexao->affected_rows;
        }

        $existeDados = $result->num_rows > 0;

        if (!$existeDados) {
            return $dados;
        }

        while ($registro = $result->fetch_assoc()) {
            $linha = (object) $registro;
            $dados[] = $linha;
        }

        return $dados;
    }

    public function execQuery($sql, $msg = "Não foi possivel obter os dados.") {

        $sql .=";";
        $dados = $this->executar($sql);

        if (empty($dados)) {
            throw new Exception($msg);
        }
        
        return $dados;
    }
}

$bancoDeDados = new Database($conexao);