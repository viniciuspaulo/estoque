<?php
include 'conecta.php';


$cliente_id=$_POST['cliente_id'];
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


$sql = mysqli_query($conexao, "UPDATE clientes
	SET nome = '$nome',
	email = '$email',
	telefone = '$telefone',
	cep = '$cep',
	endereco = '$endereco',
	numero = '$numero',
	cidade = '$cidade',
	estado = '$estado',
	complemento = '$complemento',
	cnpj = '$cnpj'
	WHERE cliente_id = '$cliente_id' ");

if($sql){
	echo "<center><h1> Atualizar com sucesso </h1></center>";
	header("Location: cliente_lista.php");
}else{
	header("Location: cliente_cadastra.php?id=$cliente_id");
};

