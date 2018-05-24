<?php
include 'conecta.php';


$id=$_POST['id'];
$sql = mysqli_query($conexao, "DELETE FROM fornecedor WHERE id = '$id' ");

if($sql){
	header("Location: fornecedores_lista.php");
}else{
	header("Location: fornecedores_lista.php");
};

