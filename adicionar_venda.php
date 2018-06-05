<?php

    header('Cache-Control: no-cache, must-revalidate'); 
    header('Content-Type: application/json; charset=utf-8');

    include_once("conectando.php");
    
    $valor = $_POST['valor'];
    $vendedor = $_POST['vendedor'];
    $pagamento = $_POST['pagamento'];
    $qtd = $_POST['quantidade'];
    $produtos = $_POST['produtos'];
    $data = $_POST['data'];
    $matricula = $_POST['matricula'];
    $end_entrega = $_POST['end_entrega'];
    $cliente_id = $_POST['cliente_id'];
    $sql = false;

    if(isset($_POST['id'])){

         $sql = "UPDATE fornecedor SET data = '$data', end_entrega = '$end_entrega', pagamento = '$pagamento', emaid_clientil = '$cliente_id', matricula = '$matricula', vendedor = '$vendedor' WHERE id = '".$_POST['id']."' ";
         $resultado_usuario = mysqli_query($conn, $sql);

    }else{

        $sql = "INSERT INTO venda (`data`, `pagamento`, `end_entrega`, `id_client`, `matricula`,`nun_venda`,`produto_cod_produto`,`vendedor`) VALUES ('$data','$pagamento','$end_entrega', '$cliente_id', '$matricula',0,0,'$vendedor'); ";
        $resultado_usuario = mysqli_query($conn, $sql);

        if($resultado_usuario){
            $id_venda = mysqli_insert_id($conn);
            if(isset($id_venda)){
                foreach($produtos as $produto){

                    $id = $produto['id'];
                    $valor =  $produto['valor'];
                    $quantidade =  $produto['quantidade'];
        
                    $sql = "INSERT INTO item_venda (`nun_venda`, `cod_produto`, `qtd`, `valor`,`venda_num_venda`) VALUES ('$id_venda', '$id', '$quantidade', '$valor',$id_venda); ";
                    $resultado_usuario = mysqli_query($conn, $sql);


                    $sql = "SELECT * FROM produtos  WHERE id = '$id' ";
                    $resulte_produto = mysqli_query($conn, $sql);
                    $produto = mysqli_fetch_assoc($resulte_produto);
                    $qunatidade = ((int) $produto['quantidade'] - (int) $quantidade);

                    $sql = "UPDATE produtos SET quantidade = '$qunatidade'  WHERE id = '".$id."'  ";
                    $resultado_usuario = mysqli_query($conn, $sql);

                }
            }
        }else{
            echo json_encode(false);
            return;
        }
    }

if($sql){
    echo json_encode($resultado_usuario);
}else{
    echo json_encode(false);
}
