<?php
//incluir o arquivo com as funções do Banco de Dados
include_once("../model/clientecontroller.php");
//criando um objeto da classe AgendaPessoal
$cliente = new cliente;
//Verificar se existe o campo Ação
if (isset($_REQUEST["acao"])){
switch ($_REQUEST["acao"]) {
case 'cadastrar':
//enviando os valores vindos do Android
$cliente->nomeCliente = $_POST['nomeCliente'];
$cliente->telefone = $_POST['telefone'];
$cliente->cep = $_POST['cep'];
$cliente->uf = $_POST['uf'];
$cliente->codCliente = $_POST['codCliente'];
$cliente->cpf = $_POST['cpf'];



//chamando o método cadastrar
$cliente->cadastrar();
//mensagem de confirmação 
echo "ok";
break;
case 'atualizar':
    $cliente->nomeCliente = $_POST['nomeCliente'];
    $cliente->telefone = $_POST['telefone'];
    $cliente->cep = $_POST['cep'];
    $cliente->uf = $_POST['uf'];
    $cliente->codCliente = $_POST['codCliente'];
    $cliente->cpf = $_POST['cpf'];
$cliente->atualizar();
echo "ok";
break;
case 'excluir':
$cliente->codcliente = $_POST['codCliente'];
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
$cliente->nomeCliente = $_POST['nomeCliente'];
echo json_encode($cliente->retornarDadosNome());
break;
}
}
?>