<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<script src="js/jquery.js"></script>
	<style>
		.pesquisar{
			padding : 10px;
			max-width : 400px;
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

			<div id="box">
				<div class="box-top"></div><!--box-top-->
				<div class="box-painel">
					<div class="container"><!--centralizar-->
						<div class="principal">
							<h1>Consulta Clientes - <a href="cliente_cadastra.php">NOVO</a></h1>

							<br>
							<div class="form-group pesquisar">
								<input type="text" id="pesquisar" class="form-control" placeholder="Pesquisar funcionario pelo o nome">
							</div>
							<br>

							<?php include "cliente_banco.php"; 
								$clientes = listaCliente($conexao);
							?>
							<script type="text/javascript">
								var clientes = <?php echo json_encode($clientes); ?>;
							</script>
								<table class="table">
							    <!--Table head-->
							    <thead>
							        <tr>
							            <th>Nome</th>
							            <th>E-mail</th>
										<th>Telefone</th>
							            <th>Alterar</th>
							            <th>Apagar</th>
							        </tr>
							    </thead>
							    <!--Table head-->

									<?php
										
										foreach ($clientes as $cliente) : 
									?>
									<tr>
										<td><?= $cliente['nome'] ?></td>
										<td><?= $cliente['email'] ?></td>
										<td><?= $cliente['telefone'] ?></td>
										<td><a class="btn btn-primary"  href="./cliente_cadastra.php?id=<?=$cliente['cliente_id']?>">alterar</a></td>


										<td>
											<form action="cliente_remove.php" method="post">
												<input type="hidden" name="cliente_id" value="<?=$cliente['cliente_id']?>">
												<button  class="btn btn-danger">remover</button>
											</form>	
										</td>	
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
	<script type="text/javascript">
	
		$('#pesquisar').blur(() =>{
			let nome = $("#pesquisar").val();
			let cliente = clientes.find(cliente => cliente.nome.toLowerCase().indexOf(nome.toLowerCase()) > -1);

			if(cliente){
				document.location = `cliente_cadastra.php?id=${cliente.cliente_id}`;
			}else{
				if(confirm("Deseja cadastrar um novo cliente ?")){
					document.location = `cliente_cadastra.php`;
				}
			}
		})

	</script>
</body>
</html>