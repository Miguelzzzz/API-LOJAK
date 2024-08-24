<?php

class cliente implements JsonSerializable{

    private $nomeCliente;
    private $telefone;
    private $cep;
    private $uf;
    private $cpf;
    private $codCliente;

    function jsonSerialize(): mixed{
    return array(
            'nomeCliente' => $this->nomeCliente,
            'telefone'    => $this->telefone,
            'cep'         => $this->cep,
            'uf'          => $this->uf,
            'cpf'         => $this->cpf,
            'codCliente'  => $this->codCliente,
        );
    }

    function __get($atributo){
        return $this->$atributo;
    }

    function __set($atributo, $value){
        $this->$atributo = $value;
    }

    private $con;

    function __construct() {
        include_once("conexao.php");
        $classe_con = new Conexao();
        $this->con = $classe_con->Conectar();
    }

    function cadastrar(){
        $comandoSql = "insert into tbCliente (nomeCliente, telefone, cep, uf, cpf) values(?,?,?,?,?)";
        $valores = array($this->nomeCliente, $this->telefone, $this->cep, $this->uf, $this->cpf);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function atualizar() {
        $comandoSql = "update tbCliente set nomeCliente = ?, telefone = ?, cep = ?, uf = ?, cpf = ? where codCliente = ?";
        $valores = array($this->nomeCliente, $this->telefone, $this->cep, $this->uf, $this->cpf, $this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function excluir(){
        $comandoSql = "delete from tbCliente where codCliente = ?";
        $valores = array($this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function consultar() {
        $comandoSql = "select * from tbCliente";
        $exec = $this->con->prepare($comandoSql);
        $exec->execute();
        $dados = array();

        foreach ($exec->fetchAll(PDO::FETCH_ASSOC) as $value) {
            $cliente = new self();
            $cliente->nomeCliente = $value["nomeCliente"];
            $cliente->telefone = $value["telefone"];
            $cliente->cep = $value["cep"];
            $cliente->uf = $value["uf"];
            $cliente->cpf = $value["cpf"];
            $cliente->codCliente = $value["codCliente"];
            $dados[] = $cliente;
        }
        return $dados;
    }

    function retornarDados(){
        $comandoSql = "select * from tbCliente where codCliente = ?";
        $valores = array($this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch();
        $cliente = new cliente;
        $cliente->nomeCliente = $value["nomeCliente"];
        $cliente->telefone = $value["telefone"];
        $cliente->cep = $value["cep"];
        $cliente->uf = $value["uf"];
        $cliente->cpf = $value["cpf"];
        $cliente->codCliente = $value["codCliente"];
        return $cliente;
    }

    function retornarDadosNome(){
        $comandoSql = "select * from tbCliente where nomeCliente = ?";
        $valores = array($this->nomeCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch();
        $cliente = new cliente;
        $cliente->nomeCliente = $value["nomeCliente"];
        $cliente->telefone = $value["telefone"];
        $cliente->cep = $value["cep"];
        $cliente->uf = $value["uf"];
        $cliente->cpf = $value["cpf"];
        $cliente->codCliente = $value["codCliente"];
        return $cliente;
        }
    }
?>

    