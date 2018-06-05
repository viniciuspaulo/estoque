<?php
include 'conecta.php';

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$compra = $_POST["compra"];
$quantidade = $_POST["quantidade"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];
$usado = $_POST["usado"];
$id = $_POST["id"];


if($usado != NULL){
	$usado = 1;
}else{
	$usado = 0;
}

$sql = mysqli_query($conexao,"UPDATE produtos set 
nome = '$nome',
preco = '$preco', 
quantidade = '$quantidade', 
descricao = '$descricao',
usado = '$usado',
compra = '$compra',
categoria_id = '$categoria_id' 
where id = '$id' ");

if($sql){
	echo "<center><h1> Atualizar com sucesso </h1></center>";
	header("Location: produtos-lista.php");
}else{
	header("Location: produto-altera.php?id=$id");
};

mysqli_close($cid);