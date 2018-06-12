<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <?php include 'logo.php' ?>	
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
						<div id="principal" class="principal"> 
							<h1>Produtos Vendidos</h1>
								<form>
									<table class="table">

                                    
                                        <?php if(isset($venda['id']) ) { ?>
                                            <tr>
                                                <td>Numero da venda :</td>
                                                <td><input class="form-control" type="text" disabled name="id" value="<?= isset($venda['id']) ? $venda['id'] : '' ?>"></td>
                                            </tr>
                                        <?php };?>

                                         <tr>
                                            <td>Cliente :</td>

                                            <?php if(!isset($venda['id']) ) { ?>
											<td><select id="cliente_id" name="cliente_id" class="form-control">
                                                <?php foreach ($clientes as $cliente) : ?>
                                                    <option value="<?=$cliente['cliente_id']?>">
                                                        <?=$cliente['nome']?>
                                                    </option> 
                                                <?php endforeach ?>
                                            </select></td>
                                            <?php } else { 
                                                $cliente = null;
                                                foreach ($clientes as $cli) :
                                                    if($cli['cliente_id'] === $venda['id_client']){
                                                        $cliente = $cli;
                                                    }
                                                endforeach; if($cliente) {?>
                                                <td>
                                                Código : <?= $cliente['cliente_id'] ?> | Nome : <?= $cliente['nome'] ?>
                                                </td>        
                                            <?php }} ?>
										</tr>

                                        <tr>
                                            <td>Vendedor :</td>
                                            <td><input class="form-control" type="text" disabled id="vendedor" name="vendedor" value="<?= isset($venda['id']) ? $venda['vendedor'] : $_SESSION['usuario_nome'] ?>"></td>
                                        </tr>

                                        <tr>
											<td>Matricula :</td>
											<td><input class="form-control" id="matricula" type="number" name="matricula" disabled value="<?= $_SESSION['matricula'] ?>"></td>
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
                                            <td>Forma de Pagamento:</td>
                                            <td>
                                                <select name="pagamento" id="pagamento" class="form-control" <?= isset($venda['id']) ? 'disabled' : '' ?> value="<?= isset($funcionario['pagamento']) ? $funcionario['pagamento'] : '' ?>">
                                                    <option value="1" <?= isset($venda['pagamento']) && $venda['pagamento'] == '1' ? 'selected' : '' ?>>Cartao de crédito</option>
                                                    <option value="2" <?= isset($venda['pagamento']) && $venda['pagamento'] == '2' ? 'selected' : '' ?>>Cartão de débito</option>
                                                    <option value="3" <?= isset($venda['pagamento']) && $venda['pagamento'] == '3' ? 'selected' : '' ?>>Boleto</option>
                                                    <option value="4" <?= isset($venda['pagamento']) && $venda['pagamento'] == '4' ? 'selected' : '' ?>>Cheque</option>
                                                    <option value="5" <?= isset($venda['pagamento']) && $venda['pagamento'] == '5' ? 'selected' : '' ?>>Dinheiro</option>
                                                </select>
                                            </td>
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
                                                <?php if(isset($venda['id']) ) { ?>
                                                    <a  id="imprimir" onclick="imprimir()" class="btn btn-primary">Imprimir</a>
                                                <?php };?>
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
                                                        <th>Estoque</th>
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
                                                        <td><span id='produto__<?= $produto['id']; ?>_preco'><?= $produto['preco'] ?></span></td>
                                                        <td><span id='produto__<?= $produto['id']; ?>_quantidade'><?= $produto['quantidade'] ?></span></td>
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
                                    if(isset($item)){

                                        $item['qtd'] = $item_prod['qtd'];
                                        $item['total'] = ( (float)preg_replace('/\D/', '', explode('R$:',$item['preco'])[1])/100 * (int) $item['qtd']);

                                        for ($cont = 1; $cont <= (int) $item['qtd']; $cont++){
                                            $total += (float)preg_replace('/\D/', '', explode('R$:',$item['preco'])[1])/100;
                                        }
                                        
                                        array_push($itens, $item);
                                    
                                    }
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
                            pagamento : $("#pagamento").val(),
                            end_entrega : $("#end_entrega").val(),
                            cliente_id : $("#cliente_id").val(),
                            vendedor : $("#vendedor").val(),
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

            let estoque = parseInt($(`#produto__${id}_quantidade`).html());

            let quantidade = parseInt(prompt(`Digte a quantidade |  Disponível : ${estoque}`));

            if(estoque === 0){
                alert("Não existe produto em estoque");
                return;
            }
            
            if(quantidade > estoque){
                alert("Quantidade insulficiente");
                return;
            }

            $(`#produto__${id}_quantidade`).html(estoque - quantidade)
            

            let existe = produtos.find(id_s => id_s.id === id);
            if(existe){
                produtos = produtos.map(produto =>{
                    if(produto.id === id){
                        total += valor;
                        produto.quantidade += quantidade;
                    }
                    return produto;
                });
            }else{
                let produto = {};
                produto.id = id;
                produto.quantidade = quantidade;
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


        function imprimir(){
            var conteudo = document.getElementById('principal').innerHTML;
            tela_impressao = window.open('about:blank');
            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
            tela_impressao.window.close();
        }
	
	</script>
</body>
</html>