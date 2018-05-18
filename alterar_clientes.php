<?php
include("conexao.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$idade = $_POST["idade"];
$estado = $_POST["estado"];
$id = $_GET["id"];

$sql = "UPDATE clientes set nome_clientes = '$nome',email_clientes = '$email', sexo_clientes = '$sexo',idade_clientes = '$idade',estado_clientes = '$estado'";
echo $sql;
?>