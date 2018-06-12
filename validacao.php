<?php


include_once("conectando.php");

$texto = $_POST['texto'];
$campo = $_POST['campo'];
$tabela = $_POST['tabela'];

$sql = "SELECT * FROM $tabela WHERE $campo = '$texto'";
$resultado = mysqli_query($conn, $sql);
$resultado = mysqli_fetch_assoc($resultado);
echo json_encode($resultado);