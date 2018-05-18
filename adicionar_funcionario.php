<?php

include_once("conectando.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

if(empty($nome)){
	echo "<script>alert('porfavor preencha os campos vazios'); history().back();</script>";
}elseif(empty($email)){
	echo "<script>alert('porfavor preencha os campos vazios'); history().back();</script>";
}


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO usuarios (nome, email, username, created) VALUES ('$nome', '$email', '$username', now())";
$resultado_usuario = mysqli_query($conn, $result_usuario);