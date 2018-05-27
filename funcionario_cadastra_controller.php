<?php
include 'conecta.php';

$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$matricula=$_POST['matricula'];
$cep=$_POST['cep'];
$endereco=$_POST['endereco'];
$numero=$_POST['numero'];
$complemento=$_POST['complemento'];
$bairro=$_POST['bairro'];
$estado=$_POST['estado'];
$cargo=$_POST['cargo'];
$dataadmissao=$_POST['dataadmissao'];
$datadesligamento=$_POST['datadesligamento'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$perfil=$_POST['perfil'];
$telefone=$_POST['telefone'];


if(empty($nome)){
	echo "<script>alert('Campo nome não foi preenchido corretamente.'); history.back();</script>";
	header("Location: funcionario_cadastra.php");
}elseif(empty($email)){
	echo "<script>alert('Campo E-mail não foi preenchido corretamente.'); history.back();</script>";
	header("Location: funcionario_cadastra.php");
}


$sql = mysqli_query($conexao, "INSERT INTO funcionario(nome, cpf, matricula ,cep, endereco, numero, complemento, bairro, estado, cargo, dataadmissao, datadesligamento, email, senha, perfil , telefone) 
VALUES('$nome','$cpf', '$matricula', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$estado', '$cargo', '$dataadmissao' ,'$datadesligamento','$email','$senha','$perfil', '$telefone')");

if($sql){
	echo "<center><h1> Cadastrado com sucesso </h1></center>";
	header("Location: funcionario_lista.php");
}else{
	header("Location: funcionario_cadastra.php");
};

mysqli_close($cid);

