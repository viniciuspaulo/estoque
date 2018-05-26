<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>

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
							<h1>Lista de Fornecedores - <a href="./cadastra_fornecedor.php">Novo Fornecedor</a></h1>

								<?php include("conecta.php");
									$forncedores = [];
									$resultado = mysqli_query($conexao, "select * from fornecedor");	
									while($fornecedor = mysqli_fetch_assoc($resultado)) {
										array_push($forncedores, $fornecedor);
									}
									//var_dump($forncedores);
								?>
								<table class="table">
									<!--Table head-->
									<thead>
										<tr>
											<th>Nome</th>
											<th>CNPJ</th>
											<th>Email</th>
											<th>Telefone</th>
											<th>Alterar</th>
											<th>Apagar</th>
										</tr>
									</thead>
									<!--Table head-->

										<?php
											foreach ($forncedores as $fornecedor) : 
										?>
										<tr>
											<td><?= $fornecedor['nome'] ?></td>
											<td><?= $fornecedor['cnpj'] ?></td>
											<td><?= $fornecedor['email'] ?></td>
											<td><?= $fornecedor['telefone']?></td>
											<td><a class="btn btn-primary"  href="cadastra_fornecedor.php?id=<?=$fornecedor['id']?>">alterar</a></td>


											<td>
												<form action="fornecedor_remove.php" method="post">
													<input type="hidden" name="id" value="<?=$fornecedor['id']?>">
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
</body>
</html>