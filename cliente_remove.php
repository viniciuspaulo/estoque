<?php
include 'conecta.php';


$cliente_id=$_POST['cliente_id'];

$sql = mysqli_query($conexao, "DELETE FROM venda WHERE id_client = '$cliente_id' ");
$sql = mysqli_query($conexao, "DELETE FROM clientes WHERE cliente_id = '$cliente_id' ");


if($sql){
	header("Location: cliente_lista.php");
}else{
	header("Location: cliente_cadastra.php?id=$cliente_id");
};

