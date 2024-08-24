<?php

include_once("../model/cliente.php");

$cliente = new cliente;

if (isset($_REQUEST["acao"])){
    switch ($_REQUEST["acao"]) {
    case 'cadastrar':

    $cliente->nomeCliente = $_POST['nome'];
    $cliente->telefone = $_POST['telefone'];
    $cliente->cep = $_POST['cep'];
    $cliente->uf = $_POST['uf'];
    $cliente->cpf = $_POST['cpf'];

    $cliente->cadastrar();
    echo "ok";
    break;


    case 'atualizar':
    $cliente->nomeCliente = $_POST['nome'];
    $cliente->telefone = $_POST['telefone'];
    $cliente->cep = $_POST['cep'];
    $cliente->uf = $_POST['uf'];
    $cliente->cpf = $_POST['cpf'];
    $cliente->codCliente = $_POST['codCliente'];

    $cliente->atualizar();
    echo "ok";
    break;

    case 'excluir':
    $cliente->codCliente = $_POST['codCliente'];
    $cliente->excluir();
    echo "ok";
    break;

    case 'consultar_json':
    echo json_encode($cliente->consultar());
    break;

    case 'retorna_cod':
    $cliente->codCliente = $_POST['codCliente'];
    echo json_encode($cliente->retornarDados());
    break;

    case 'retorna_nome':
    $cliente->nomeCliente = $_POST['nome'];
    echo json_encode($cliente->retornarDadosNome());
    break;
    }
}

?>