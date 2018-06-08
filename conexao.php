<?php

	session_start();

	require "conecta.php";
	
	if(isset($_POST['email']) && isset($_POST['senha'])){
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$usuario = mysqli_query($conexao, "select * from funcionario where email =  '$email' ");
		$usuario = mysqli_fetch_assoc($usuario);

		if($usuario && ($usuario['senha'] == $senha)){
			
			$_SESSION['usuario_email'] = $email;
			$_SESSION['usuario_nome'] = $usuario['nome'] ;
			$_SESSION['perfil'] = $usuario['perfil'] ;
			$_SESSION['matricula'] = $usuario['matricula'] ;

			header("Location: home.php");
		}else{
			header("Location: index.php?login=false");
		}
	}
?>