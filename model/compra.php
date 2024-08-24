<?php

    class produto implements JsonSerializable{

    //atributos da classe
    private $nomeproduto;
    private $pagamento;
    private $email;
    private $codproduto;
    private $vendedora;
    private $valor;



    //metodo para gerar o json
    function jsonSerialize(){

    return
        [
            'nomeproduto'    => $this->nomeproduto,
            'pagamento'      => $this->pagamento,
            'email'     => $this->email,
            'codproduto'     => $this->codproduto,
            'vendedora'     => $this->vendedora,
            'valor'     => $this->valor;


        ];
    }

    //Metodos Get e Set
    //Metodos Magicos

    function __get($atributo){
        return $this->atributo;
    }

    function __set($atributo, $value){
        $this->$atributo = $value;
    }
    
    //acessar o banco de dados
    private $con;
        function __construct(){
            include_once("conexao.php");
            $classe_con = new Conexao();
            $this->con = $classe_con->Conectar();
    }

    function cadastrar(){
        $comandoSql = "insert into produto (nomeproduto, pagamento, email,codproduto,vendedora,valor) values (?,?,?,?,?,?)";
        $valores = array($this->nome, $this->pagamento, $this->email, $this->codproduto, $this->vendedora, $this->valor);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function atualizar(){
        $comandoSql = "update produto set nome = ?, pagamento = ?, email = ?, vendedora, valor = ? = ? where codproduto = ?";
        $valores = array($this->nome, $this->pagamento, $this->email, $this->codproduto, $this->vendedora, $this->valor);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function excluir(){
        $comandoSql = "delete from produto where codproduto = ?";
        $valores = array($this->codigo);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
    }

    function consultar(){
        $comandoSql = "select * from produto";
        $exec = $this->con->prepare($comandoSql);
        $exec->execute();
        $dados = array();
    foreach ($exec->fetchAll() as $value) {
        $produto = new produto;
        $produto->nome = $value["nomeproduto"];
        $produto->telefone = $value["pagamento"];
        $produto->email = $value["email"];
        $produto->codproduto = $value["codproduto"];
        $produto->vendedora = $value["vendedora"];
        $produto->valor = $value["valor"];
        $dados[] = $produto;
    }
        return $dados;
    }

    function retornarDados(){
        $comandoSql = "select * from produto where codproduto = ?";
        $valores = array($this->codproduto);
        $exec = $this->con->prepare($comandoSql);
        $exec->execute($valores);
        $value = $exec->fetch();
        $produto = new produto;
        $produto->nome = $value["nomeproduto"];
        $produto->telefone = $value["pagamento"];
        $produto->email = $value["email"];
        $produto->codproduto = $value["codproduto"];
        $produto->vendedora = $value["vendedora"];
        $produto->valor = $value["valor"];
        return $produto;
    }

    function retornarDadosNome(){
            $comandoSql = "select * from produto where nomeproduto = ?";
            $valores = array($this->nome);
            $exec = $this->con->prepare($comandoSql);
            $exec->execute($valores);
            $value = $exec->fetch();
            $produto = new produto;
             $produto->nome = $value["nomeproduto"];
            $produto->telefone = $value["pagamento"];
            $produto->email = $value["email"];
            $produto->codproduto = $value["codproduto"];
            $produto->vendedora = $value["vendedora"];
            $produto->valor = $value["valor"];
            return $produto;
        }   
    }
?>