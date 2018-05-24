<?php 
include 'conecta.php';

function listaCliente($conexao) {
	$clientes = array();
	$resultado = mysqli_query($conexao, "select * from clientes");
 	while($cliente = mysqli_fetch_assoc($resultado)) {
 		array_push($clientes, $cliente);
 	}
 	return $clientes;
}