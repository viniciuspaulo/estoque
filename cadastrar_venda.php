<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
	<script>

        var produtos = [];
        var total = 0.00;
        var quantidade = 0;

		//Mascara CPF
		$(document).ready(function(){
			$('.mask-cpf').mask("99.999.999/9999-99");
			$('.mask-cpf').mask("99.999.999/9999-99");
		});
    </script>
    <style>
        .row{
            display:flex;
            justify-content: space-around;
            font-size:0.8em;
        }

        .row .col-6{
            background-color: #ccc;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
        }
</style>
</head>
<body>
	<div id="header">
		<div class="logo"><a href="logado.php">Admini<span>strador</span></a></div>
		<div class="adm">
			<li><a href="#"><span><?php
                                session_start();
                                
                                setlocale(LC_MONETARY,"en_US");
								
								if(isset($_SESSION['adm'])){
									echo 'Adm: '.$_SESSION['adm'].'';
								}else if(isset($_SESSION['nor'])){
									echo 'User: '.$_SESSION['nor'].'';
								}
							?></span></a></li>
			<li><a href="sair.php">Sair</a></li>
		</div><!--adm-->		
		<nav>
			<?php include 'menu.php' ?>
		</nav>		
	</div><!-- fim header-->
	<div id="container">

		<div class="sidebar">
            <?php include 'menu-lateral.php' ?>
		</div>

		<div class="content">
			<h1>Sigemac</h1>
			<p>Sistema de Gestão de Material de Construção</p>



            <?php include("conecta.php");
            
                $vendas = mysqli_query($conexao, "select count(*) as total from item_venda");
                $vendas = mysqli_fetch_assoc($vendas);
                            

				if( isset($_GET["id"]) ){
					$venda = mysqli_query($conexao, "select * from venda where id = '".$_GET["id"]."' ");
					$venda = mysqli_fetch_assoc($venda);
                }
                

                $produtos = [];
                $resultado = mysqli_query($conexao, "select * from produtos");	
                while($produto = mysqli_fetch_assoc($resultado)) {
                    array_push($produtos, $produto);
                }


                $clientes = [];
                $resultado = mysqli_query($conexao, "select * from clientes");	
                while($cliente = mysqli_fetch_assoc($resultado)) {
                    array_push($clientes, $cliente);
                }
				
			?>

			<div id="box">
				<div class="box-top"></div><!--box-top-->
				<div class="box-painel">
					<div class="container"><!--centralizar-->
						<div class="principal"> 
							<h1>Cadastra Venda</h1>
								<form>
									<table class="table">
                                        <?php if(isset($venda['id']) ) { ?>
                                            <tr>
                                                <td>Numero da venda :</td>
                                                <td><input class="form-control" type="text" disabled name="id" value="<?= isset($venda['id']) ? $venda['id'] : '' ?>"></td>
                                            </tr>
                                        <?php };?>
                                        <tr>
											<td>Matricula :</td>
											<td><input class="form-control" id="matricula" type="number" name="matricula" value="<?= isset($venda['matricula']) ? $venda['matricula'] : '' ?>"></td>
                                        </tr>
                                        <tr>
											<td>Data :</td>
											<td><input class="form-control" id="data" type="date" name="data" value="<?= isset($venda['data']) ? $venda['data'] : '' ?>"></td>
                                        </tr>
                                        <tr>
											<td>Entrega :</td>
											<td><input class="form-control" id="end_entrega" type="date" name="end_entrega" value="<?= isset($venda['end_entrega']) ? $venda['end_entrega'] : '' ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Cliente :</td>
											<td><select id="cliente_id" name="cliente_id">
                                                <?php foreach ($clientes as $cliente) : ?>
                                                    <option value="<?=$cliente['cliente_id']?>">
                                                        <?=$cliente['nome']?>
                                                    </option> 
                                                <?php endforeach ?>
                                            </select></td>
										</tr>
										<tr>
											<td colspan="2">
                                                <?php if(!isset($venda['id']) ) { ?>
                                                    <input type="submit" value="Cadastrar" id="btnCad" class="btn btn-primary"> 
                                                <?php };?>
												&nbsp;
												<a href="./vendas_lista.php">
													<input type="button" value="Cancelar" class="btn btn-danger" id="btnCancelar">
												</a>
											</td>
										</tr>	
									</table>
								</form>

                                <?php if(!isset($venda['id']) ) { ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <table class="table">
                                                <!--Table head-->
                                                <h4>PRODUTOS ADICIONADO</h4>
                                                <thead>
                                                    <tr>
                                                        <th>Cod</th>
                                                        <th>QTD</th>
                                                    </tr>
                                                </thead>
                                                <!--Table head-->
                                                <tbody id="produtosAdicionado"></tbody>
                                            </table>
                                        </div>

                                        <div class="col-6">
                                            <table class="table">
                                                <!--Table head-->
                                                <h4>PRODUTOS</h4>
                                                <thead>
                                                    <tr>
                                                        <th>Cod</th>
                                                        <th>Nome</th>
                                                        <th>PRECO</th>
                                                        <th>Descricao</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <!--Table head-->

                                                    <?php
                                                        foreach ($produtos as $produto) : 
                                                    ?>
                                                    <tr>
                                                        <td><?= $produto['id'] ?></td>
                                                        <td><?= $produto['nome'] ?></td>
                                                        <td><?= $produto['preco'] ?></td>
                                                        <td><?= $produto['descricao'] ?></td>
                                                        <td>
                                                            <button class="btn btn-primary" onclick="addProdutos(<?= $produto['id'] ?>,'<?= $produto['preco'] ?>')">Adicionar</button>
                                                        </td>
                                                    </tr>	
                                                    <?php
                                                        endforeach
                                                    ?>
                                            </table>
                                        </div>
                                    </div>
                                <?php };?>
                                


                                <?php
                                

                                $itens = [];
                                $total = 0.00;
                                if(isset($venda['id'])){
                                $resultado = mysqli_query($conexao, "select * from item_venda where venda_num_venda = '".$venda['id']."'");	
                                while($item_prod = mysqli_fetch_assoc($resultado)) {

                                    $item = mysqli_query($conexao, "select * from produtos where id = '".$item_prod['cod_produto']."'");
                                    $item = mysqli_fetch_assoc($item);


            
                                    $item['qtd'] = $item_prod['qtd'];
                                    $item['total'] = ( (float)preg_replace('/\D/', '', explode('R$:',$item['preco'])[1])/100 * (int) $item['qtd']);


                                    for ($cont = 1; $cont <= $item['qtd']; $cont++){
                                        $total += (float)preg_replace('/\D/', '', explode('R$:',$item['preco'])[1])/100;
                                    }
                                    
                                    array_push($itens, $item);
                                }


                                if(isset($_GET['id']) ) { ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <table class="table">
                                                <!--Table head-->
                                                <thead>
                                                    <tr>
                                                        <th>Cod</th>
                                                        <th>Nome</th>
                                                        <th>Quantidade</th>
                                                        <th>PRECO</th>
                                                        <th>Descricao</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <!--Table head-->
                                                <?php
                                                    foreach ($itens as $produto) : 
                                                ?>
                                                <tr>
                                                    <td><?= $produto['id'] ?></td>
                                                    <td><?= $produto['nome'] ?></td>
                                                    <td><?= $produto['qtd'] ?></td>
                                                    <td><?= $produto['preco'] ?></td>
                                                    <td><?= $produto['descricao'] ?></td>
                                                    <td>R$ <?= number_format((float) $produto['total'], 2, '.', '') ?></td>
                                                </tr>	
                                                <?php
                                                    endforeach
                                                ?>

                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <h4>TOTAL : R$ <?= number_format((float)$total, 2, '.', '') ?></h4>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                <?php } };?>


						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
		</div><!--content-->
	</div><!--container-->
	<script type="text/javascript">
		$(function () {

			$('form').on('submit', function (e) {
                if(produtos.length > 0){
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: 'adicionar_venda.php',
                        data: {
                            data : $("#data").val(),
                            matricula : $("#matricula").val(),
                            end_entrega : $("#end_entrega").val(),
                            cliente_id : $("#cliente_id").val(),
                            valor : total,
                            quantidade : quantidade,
                            produtos : produtos
                        },
                        success: (e) => {
                            alert("venda cadastrado com sucesso");
                            window.location.replace("./vendas_lista.php");
                        },
                        error : (e) =>{
                            console.log(e);
                            alert("Problemas de conexao");
                        }
                    });
                }else{
                    alert("Adicione pelo menos 1 produto");
                }
				
			});
		});		



         addProdutos = (id,valor) =>{
            valor =  parseFloat(valor.split('R$:')[1]);
            quantidade++;
            
            let existe = produtos.find(id_s => id_s.id === id);
            if(existe){
                produtos = produtos.map(produto =>{
                    if(produto.id === id){
                        total += valor;
                        produto.quantidade++;
                    }
                    return produto;
                });
            }else{
                let produto = {};
                produto.id = id;
                produto.quantidade = 1;
                produto.valor = valor;
                produtos.push(produto);
            }
            
            montarTABLE();
        }

        removerProdutos = (id) =>{
            produtos = [];
            montarTABLE();
        }



        function montarTABLE(){
            $("#produtosAdicionado").html("");
            
            console.log(produtos);

            let trs = produtos.map( produto =>{
                return `
                <tr>
                    <td>${produto.id}</td>
                    <td>${produto.quantidade}</td>
                    
                </tr>`;
            });
            $("#produtosAdicionado").append(trs);

            $("#valor").val(total);
            $("#quantidade").val(quantidade);
        }
	
	</script>
</body>
</html>