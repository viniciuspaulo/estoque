<?php 
include 'conecta.php';

function listaFuncionario($conexao) {
	$funcionarios = array();
	$resultado = mysqli_query($conexao, "select * from funcionario");
 	while($funcionario = mysqli_fetch_assoc($resultado)) {
 		array_push($funcionarios, $funcionario);
 	}
 	return $funcionarios;
}