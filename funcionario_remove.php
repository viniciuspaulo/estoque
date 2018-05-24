<?php
include 'conecta.php';


$funcionario_id=$_POST['funcionario_id'];
$sql = mysqli_query($conexao, "DELETE FROM funcionario WHERE funcionario_id = '$funcionario_id' ");

if($sql){
	header("Location: funcionario_lista.php");
}else{
	header("Location: funcionario_cadastra.php?id=$funcionario_id");
};

