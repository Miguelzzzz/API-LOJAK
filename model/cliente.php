<?php
class cliente implements JsonSerializable{
//atributos da classe

private $nomecliente;
private $telefone;
private $cep;
private $cpf;
private $uf;
private $codcliente;

//metodo para gerar o json
function jsonSerialize(){
return
[
'nomecliente' => $this->nomecliente,
'telefone' => $this->telefone,
'cep' => $this->cep,
'cpf' => $this->cpf,
'codcliente' => $this->codcliente,
'uf' => $this->uf
];
}
//Metodos Get e Set
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
$comandoSql = "insert into bdlojak (nomecliente, telefone, cep, cpf, uf) values
(?,?,?,?,?)";
$valores = array($this->nomecliente, $this->telefone, $this->cep, $this->cpf, $this->uf);
$exec = $this->con->prepare($comandoSql);
$exec->execute($valores);
}
function atualizar(){
$comandoSql = "update bdlojak set nomecliente = ?, telefone = ?, cep = ?, cpf = ?, uf = ?, where codcliente = ?";
$valores = array($this->nomecliente, $this->telefone, $this->cep, $this->cpf,  $this->uf, $this->codcliente);
$exec = $this->con->prepare($comandoSql);
$exec->execute($valores);
}
function excluir(){
$comandoSql = "delete from bdlojak where codcliente = ?";
$valores = array($this->codcliente);
$exec = $this->con->prepare($comandoSql);
$exec->execute($valores);
}
function consultar(){
$comandoSql = "select * from bdlojak";
$exec = $this->con->prepare($comandoSql);
$exec->execute();



$dados = array();
foreach ($exec->fetchAll() as $value) {
$cliente = new cliente;
$cliente->nomecliente = $value["nomecliente"];
$cliente->telefone = $value["telefone"];
$cliente->cep = $value["cep"];
$cliente->cpf = $value["cpf"];
$cliente->uf = $value["uf"];
$dados[] = $cliente;
}
return $dados;
}
function retornarDados(){
$comandoSql = "select * from bdlojak where codcliente = ?";
$valores = array($this->codcliente);
$exec = $this->con->prepare($comandoSql);
$exec->execute($valores);
$value = $exec->fetch();
$cliente = new cliente;
$cliente->nomecliente = $value["nomecliente"];
$cliente->telefone = $value["telefone"];
$cliente->cep = $value["cep"];
$cliente->cpf = $value["cpf"];
$cliente->uf = $value["uf"];
return $cliente;
}



function retornarDadosNome(){
    $comandoSql = "select * from bdlojak where nomecliente = ?";
    $valores = array($this->nome);
    $exec = $this->con->prepare($comandoSql);
    $exec->execute($valores);
    $value = $exec->fetch();
    $cliente = new cliente;
    $cliente->nomecliente = $value["nomecliente"];
    $cliente->telefone = $value["telefone"];
    $cliente->cep = $value["cep"];
    $cliente->uf = $value["uf"];
    $cliente->codcliente = $value["codcliente"];
    return $cliente;
    }
    }
    ?>

    