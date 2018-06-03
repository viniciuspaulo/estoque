<?php

    header('Cache-Control: no-cache, must-revalidate'); 
    header('Content-Type: application/json; charset=utf-8');

    include_once("conectando.php");
    
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $naturalidade = $_POST['naturalidade'];
    $produto = $_POST['produto'];


    if(isset($_POST['id'])){

        $sql = "UPDATE fornecedor 
        SET nome = '$nome', 
        cnpj = '$cnpj', 
        email = '$email', 
        complemento = '$complemento', 
        bairro = '$bairro', 
        cidade = '$cidade', 
        estado = '$estado', 
        naturalidade = '$naturalidade', 
        telefone = '$telefone',
        produto = '$produto' 
        WHERE id = '".$_POST['id']."'";

        $resultado_usuario = mysqli_query($conn, $sql);

    }else{

        $sql = "INSERT INTO 
        fornecedor (`nome`,`cnpj`, `email`, `telefone`,`complemento`,`bairro`,`cidade`,`estado`,`naturalidade`, `compra_cnpj`, `produto`) 
        VALUES ('$nome', '$cnpj', '$email', '$telefone', '$complemento', '$bairro', '$cidade', '$estado','$naturalidade', 0, '$produto'); ";
        $resultado_usuario = mysqli_query($conn, $sql);

    }
    

    echo json_encode($resultado_usuario);
