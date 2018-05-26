<?php
include 'conecta.php';

$funcionario_id=$_POST['funcionario_id'];
$nome=$_POST['nome'];
$matricula=$_POST['matricula'];
$cpf=$_POST['cpf'];
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



if(empty($nome)){
	echo "<script>alert('Campo nome não foi preenchido corretamente.'); history.back();</script>";
	header("Location: cadastra_funcionario.php");
}elseif(empty($email)){
	echo "<script>alert('Campo E-mail não foi preenchido corretamente.'); history.back();</script>";
	header("Location: cadastra_funcionario.php");
}


$sql = mysqli_query($conexao, "UPDATE funcionario
	SET nome = '$nome',
	cpf = '$cpf',
	cep = '$cep',
	matricula = '$matricula',
	endereco = '$endereco',
	numero = '$numero',
	complemento = '$complemento',
	bairro = '$bairro',
	estado = '$estado',
	cargo = '$cargo',
	dataadmissao = '$dataadmissao',
	datadesligamento = '$datadesligamento',
	email = '$email',
	senha = '$senha', 
	perfil = '$perfil' 
	WHERE funcionario_id = '$funcionario_id'");

if($sql){
	echo "<center><h1> Atualizar com sucesso </h1></center>";
	header("Location: funcionario_lista.php");
}else{
	header("Location: funcionario_cadastrar.php?id=$funcionario_id");
};

mysqli_close($cid);

