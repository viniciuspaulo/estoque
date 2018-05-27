<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<style>
		input[type='date']{
			border: none;
			width: 100%;
			text-align: center;
			font-weight: bolder;
			font-size: 1.1em;
		}
	</style>
</head>
<body>
	<div id="header">
		<?php include 'logo.php' ?>
		<nav>
			<?php include 'menu.php' ?>
		</nav>	
		
	</div>
	<div id="container">

		<div class="sidebar">
			<?php include 'menu-lateral.php' ?>
		</div>

		<div class="content">
			<h1>Sigemac</h1>
			<p>Sistema de Gestão de Material de Construção</p>

			<div id="box">
				<div class="box-top"></div><!--box-top-->
				<div class="box-painel">
					<div class="container"><!--centralizar-->
						<div class="principal">
							<h1>Lista de Vendas - <a href="./cadastrar_venda.php">Novo Venda</a></h1>

								<?php include("conecta.php");
									$vendas = [];
									$resultado = mysqli_query($conexao, "select * from venda");	
									while($venda = mysqli_fetch_assoc($resultado)) {

										$venda['cliente'] = mysqli_fetch_assoc(mysqli_query($conexao, "select * from clientes where cliente_id = '".$venda['id_client']."' "));	
										array_push($vendas, $venda);
									}
									$vendas = array_reverse($vendas);
								?>
								<table class="table">
									<!--Table head-->
									<thead>
										<tr>
											<th>Quantidade</th>
                                            <th>Cod</th>
                                            <th>Cliente</th>
											<th>Data Pedido</th>
											<th>Data Entrega</th>
											<th></th>
										</tr>
									</thead>
									<!--Table head-->

										<?php
											foreach ($vendas as $venda) : 
											$resultado = mysqli_query($conexao, "select COUNT(*) from item_venda where venda_num_venda = '".$venda['id']."' ");	
											$item_prod = mysqli_fetch_assoc($resultado);
										?>
										<tr>
											<td><?= $item_prod["COUNT(*)"]; ?></td>
											<td><?= $venda['id'] ?></td>
											<td><?= $venda['cliente']['nome'] ?></td>
											<td><input type="date" value="<?= $venda['data'] ?>" disabled></td>
											<td><input type="date" value="<?= $venda['end_entrega'] ?>" disabled></td>
											<td><a class="btn btn-primary"  href="cadastrar_venda.php?id=<?=$venda['id']?>">Ver</a></td>
										</tr>	
										<?php
											endforeach
										?>
								</table>
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
			
		</div><!--content-->
	</div><!--container-->
</body>
</html>