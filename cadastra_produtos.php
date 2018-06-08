<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
	<?php include 'script.php' ?>
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
							<?php include("conecta.php");
								  include("banco-categoria.php");

								  $categorias = listaCategorias($conexao);

								  $query = mysqli_query($conexao, "SELECT * FROM fornecedor");
								  $fornecedores =  [];
								  while($fornec = mysqli_fetch_assoc($query)) {
									array_push($fornecedores, $fornec['nome']);
								  }
    
							?>	  
							<h1>Cadastra produto</h1>
								
									<div id="cadastro">
										<form method="post" action="adicionar_produto.php">
											<table class="table" id="cad_tabla_prod">
												<tr>
													<td>Nome:</td>
													<td><input type="text" class="form-control" name="nome" id="nome" class="txt" /></td>
												</tr>
												<tr>
													<td>Valor da compra:</td>
													<td><input class="form-control mask-money" type="text" id="compra" name="compra"></td>
												</tr>
												<tr>
													<td>Valor da venda:</td>
													<td><input class="form-control mask-money" type="text" id="preco" name="preco"></td>
												</tr>
												<tr>
													<td>Descrição:</td>
													<td><textarea class="form-control" name="descricao" id="descricao" class="txt"></textarea></td>
												</tr>

												<tr>
													<td>Quantidade em Estoque:</td>
													<td><input type="number" class="form-control" name="quantidade"/></td>
												</tr>

												<tr>
													<td></td>
													<td><input type="checkbox" name="usado" value="true" />usado
												</tr>																								
												<tr>
													<td>Categoria:</td>
													<td>
														<select name="categoria_id">
															<?php foreach ($categorias as $categoria) : ?>
																<option value="<?=$categoria['id']?>">
																	<?=$categoria['nome']?>
																</option> 
															<?php endforeach ?>
														</select>
													</td>
												</tr>

												<tr>
													<td>Fornecedor:</td>
													<td>
														<select class="form-control" name="fornecedor">
															<?php foreach ($fornecedores as $fornecedor) : ?>
																<option value="<?= $fornecedor ?> ">
																	<?= $fornecedor ?>
																</option> 
															<?php endforeach ?>
														</select>
													</td>
												</tr>

												<tr>
													<td colspan="2"><input type="submit" value="Cadastrar" id="btnCad"> 
													&nbsp;
													<a href="produtos-lista.php">
														<input type="button" value="Cancelar" class="btn" id="btnCancelar">
													</a>
												</td>
												</tr>	
											</table>
										</form>
									</div>

								</form>
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
		</div><!--content-->
	</div><!--container-->
</body>
</html>