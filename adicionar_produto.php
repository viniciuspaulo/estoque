<?php 

include "conecta.php" ; 

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado', $_POST)) {
	$usado = "true";
}else{
	$usado = "false";
}

$sql = mysqli_query($conexao, "INSERT INTO produtos(nome, preco, descricao, categoria_id, usado,) 
VALUES('$nome','$preco', '$descricao', '$categoria_id', '$usado')");

if($sql){
	echo "<center><h1> Cadastrado com sucesso </h1></center>";
	header("Location: produtos-lista.php");
}else{
	header("Location: produtos-lista.php");
};

mysqli_close($conexao);
