<?php
include 'conecta.php';

$nome=$_POST['nome'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$cep=$_POST['cep'];
$endereco=$_POST['endereco'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$complemento=$_POST['complemento'];
$cnpj=$_POST['cnpj'];


$sql = mysqli_query($conexao, "INSERT INTO clientes(nome, email, telefone, cep, endereco, numero, cidade, estado, complemento, cnpj) 
VALUES('$nome','$email', '$telefone', '$cep', '$endereco', '$numero', '$cidade', '$estado','$complemento','$cnpj')");


if($sql){
	echo "<center><h1> Cadastrado com sucesso </h1></center>";
	header("Location: cliente_lista.php");
}else{
	header("Location: cliente_cadastra.php");
};

mysqli_close($cid);

