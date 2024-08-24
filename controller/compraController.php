<?php
//incluir o arquivo com as funções do Banco de Dados
include_once("../model/produtocontroller.php");
//criando um objeto da classe AgendaPessoal
$produto = new produto;
//Verificar se existe o campo Ação
if (isset($_REQUEST["acao"])){
switch ($_REQUEST["acao"]) {
case 'cadastrar':
//enviando os valores vindos do Android
$produto->nomeproduto = $_POST['nomeproduto'];
$produto->pagamento = $_POST['pagamento'];
$produto->email = $_POST['email'];
$produto->codproduto = $_POST['codproduto'];
$produto->vendedora = $_POST['vendedora'];
$produto->valor = $_POST['valor'];



//chamando o método cadastrar
$produto->cadastrar();

//mensagem de confirmação 
echo "ok";
break;
case 'atualizar':
    $produto->nomeproduto = $_POST['nomeproduto'];
$produto->pagamento = $_POST['pagamento'];
$produto->email = $_POST['email'];
$produto->codproduto = $_POST['codproduto'];
$produto->vendedora = $_POST['vendedora'];
$produto->valor = $_POST['valor'];
$cliente->atualizar();
echo "ok";
break;

case 'excluir':
$produto->codproduto = $_POST['codproduto'];
$produto->excluir();
echo "ok";
break;

case 'consultar_json':
echo json_encode($produto->consultar());
break;

case 'retorna_cod':
$produto->codproduto = $_POST['codproduto'];
echo json_encode($produto->retornarDados());
break;

case 'retorna_nome':
$produto->nomeproduto = $_POST['nomeproduto'];
echo json_encode($produto->retornarDadosNome());
break;

}
}
?>