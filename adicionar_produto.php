<?php include("conecta.php"); include("banco-produto.php");

$nome =  $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado', $_POST)) {
	$usado = "true";
}else{
	$usado = "false";
}

if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) {
	header("Location: produtos-lista.php");
} else {
	header("Location: produtos-lista.php");
}

mysqli_close($conexao);
