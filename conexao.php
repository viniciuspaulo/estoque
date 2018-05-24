<?php

	session_start();

	require "conecta.php";
	
	if(isset($_POST['email']) && isset($_POST['senha'])){
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$usuario = mysqli_query($conexao, "select * from usuario where email =  '$email' ");
		$usuario = mysqli_fetch_assoc($usuario);

		if($usuario && ($usuario['Password'] == $senha)){
			
			$_SESSION['usuario_email'] = $email;
			$_SESSION['usuario_nome'] = $usuario['Username'] ;

			header("Location: vendas_lista.php");
		}else{
			header("Location: index.php?login=false");
		}
	}
?>