<?php

###########################
#Douglas Franklin
#demostração de classe para conexao
#usando o mysqli
###########################

class Conexao
{
    public $host = "localhost";
    public $usuario = "root";
    public $senha = "root";
    public $banco = "teste";

    private $mysqli;

    public function connect()
    {
        $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
    }

    public function close()
    {
        $this->mysqli->close();
    }

    public function execute($query)
    {
        $this->connect();
        if ($this->result = $this->mysqli->query($query)) {
            $this->close();
            return $this->result;
        } else {
            echo "Ocorreu um erro na execução da SQL";
            echo "Erro :" . $this->mysqli->error;
            echo "SQL: " . $query;
            die();
            $this->close();
        }
    }
}