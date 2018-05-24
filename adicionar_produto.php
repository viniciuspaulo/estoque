<?php 

include "conecta.php" ; 

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST['categoria_id'];
$usado = isset($_POST['usado']) ? 1 : 0;


$sql = mysqli_query($conexao, "INSERT INTO produtos(nome, preco, descricao, categoria_id, usado) 
VALUES('$nome','$preco', '$descricao', '$categoria_id', $usado)");


if($sql){
	echo "<center><h1> Cadastrado com sucesso </h1></center>";
	header("Location: produtos-lista.php");
}else{
	//header("Location: produtos-lista.php");
};

mysqli_close($conexao);
