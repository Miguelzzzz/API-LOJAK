<?php

include_once("../model/compra.php");

$compra = new compra;

if (isset($_REQUEST["acao"])){
    switch ($_REQUEST["acao"]) {
    case 'cadastrar':

    $compra->nomeProduto = $_POST['nomeProduto'];
    $compra->vendedora = $_POST['vendedora'];
    $compra->formaPagamento = $_POST['formaPagamento'];
    $compra->valor = $_POST['valor'];
    $compra->codCliente = $_POST['codCliente'];

    $compra->cadastrar();
    echo "ok";
    break;

    case 'atualizar':
    $compra->nomeProduto = $_POST['nomeProduto'];
    $compra->vendedora = $_POST['vendedora'];
    $compra->formaPagamento = $_POST['formaPagamento'];
    $compra->valor = $_POST['valor'];
    $compra->codCompra = $_POST['codCompra'];
    $compra->codCliente = $_POST['codCliente'];

    $compra->atualizar();
    echo "ok";
    break;

    case 'excluir':
    $compra->codCompra = $_POST['codCompra'];
    $compra->excluir();
    echo "ok";
    break;

    case 'consultar_json':
    echo json_encode($compra->consultar());
    break;

    case 'retorna_cod':
    $compra->codCompra = $_POST['codCompra'];
    echo json_encode($compra->retornarDados());
    break;

    case 'retorna_nome':
    $compra->nomeProduto = $_POST['nomeProduto'];
    echo json_encode($compra->retornarDadosNome());
    break;
    }
}

?>