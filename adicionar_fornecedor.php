<?php

    header('Cache-Control: no-cache, must-revalidate'); 
    header('Content-Type: application/json; charset=utf-8');

    include_once("conectando.php");
    
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];


    if(isset($_POST['id'])){

        $sql = "UPDATE fornecedor SET nome = '$nome', cnpj = '$cnpj', email = '$email', telefone = '$telefone' WHERE id = '".$_POST['id']."'";
        $resultado_usuario = mysqli_query($conn, $sql);

    }else{

        $sql = "INSERT INTO fornecedor (`nome`,`cnpj`, `email`, `telefone`, `compra_cnpj`) VALUES ('$nome', '$cnpj', '$email', '$telefone', 0); ";
        $resultado_usuario = mysqli_query($conn, $sql);

    }
    

    echo json_encode($resultado_usuario);
