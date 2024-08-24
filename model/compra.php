<?php

    class compra implements JsonSerializable{

    private $nomeProduto;
    private $vendedora;
    private $formaPagamento;
    private $valor;
    private $codCompra;
    private $codCliente;

    function jsonSerialize(): mixed{

    return array(
            'nomeProduto'    => $this->nomeProduto,
            'vendedora'      => $this->vendedora,
            'formaPagamento' => $this->formaPagamento,
            'valor'          => $this->valor,
            'codCompra'      => $this->codCompra,
            'codCliente'     => $this->codCliente,
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
        $comandoSql = "insert into tbCompra (nomeProduto, vendedora, formaPagamento, valor, codCliente) values (?,?,?,?,?)";
        $valores = array($this->nomeProduto, $this->vendedora, $this->formaPagamento, $this->valor, $this->codCliente);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function atualizar(){
        $comandoSql = "update tbCompra set nomeProduto = ?, vendedora = ?, formaPagamento = ?, valor =?, codCliente = ? where codCompra = ?";
        $valores = array($this->nomeProduto, $this->vendedora, $this->formaPagamento, $this->valor, $this->codCliente, $this->codCompra);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function excluir(){
        $comandoSql = "delete from tbCompra where codCompra = ?";
        $valores = array($this->codCompra);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function consultar(){
        $comandoSql = "select * from tbCompra";
        $exec = $this->con->prepare($comandoSql);
        $exec->execute();
        $dados = array();

        foreach ($exec->fetchAll() as $value) {
            $compra = new compra;
            $compra->nomeProduto = $value["nomeProduto"];
            $compra->vendedora = $value["vendedora"];
            $compra->formaPagamento = $value["formaPagamento"];
            $compra->valor = $value["valor"];
            $compra->codCliente = $value["codCliente"];
            $compra->codCompra = $value["codCompra"];
            $dados[] = $compra;
        }
        return $dados;
    }

    function retornarDados(){
        $comandoSql = "select * from tbCompra where codCompra = ?";
        $valores = array($this->codCompra);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch();
        $compra = new compra;
        $compra->nomeProduto = $value["nomeProduto"];
        $compra->vendedora = $value["vendedora"];
        $compra->formaPagamento = $value["formaPagamento"];
        $compra->valor = $value["valor"];
        $compra->codCliente = $value["codCliente"];
        $compra->codCompra = $value["codCompra"];
        return $compra;
    }

    function retornarDadosNome(){
            $comandoSql = "select * from tbCompra where nomeProduto = ?";
            $valores = array($this->nomeProduto);
            $exec = $this->con->prepare($comandoSql);
            $exec->execute($valores);
            $value = $exec->fetch();
            $compra = new compra;
            $compra->nomeProduto = $value["nomeProduto"];
            $compra->vendedora = $value["vendedora"];
            $compra->formaPagamento = $value["formaPagamento"];
            $compra->valor = $value["valor"];
            $compra->codCliente = $value["codCliente"];
            $compra->codCompra = $value["codCompra"];
            return $compra;
        }   
    }
?>