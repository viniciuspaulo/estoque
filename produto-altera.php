<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<?php include 'script.php' ?>
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
							<?php include("conecta.php");
								  include("banco-categoria.php");
								  include("banco-produto.php");

								  $id = $_GET['id'];
								  $produto = buscaProduto($conexao, $id);
								  $categorias = listaCategorias($conexao);
								  $usado = $produto['usado'] ? "checked='checked'" : "";

								  $query = mysqli_query($conexao, "SELECT * FROM fornecedor");
								  $fornecedores =  [];
								  while($fornec = mysqli_fetch_assoc($query)) {
									array_push($fornecedores, $fornec['nome']);
								  }
							?>							
							<h1>Altera produtos</h1>
								<form action="altera_produto.php" method="post">
									<input type="hidden" name="id" value="<?=$produto['id']?>">
									<table class="table">
										<tr>
											<td>Nome:</td>
											 <td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
										</tr>
										<tr>
											<td>Valor da compra:</td>
											<td><input class="form-control mask-money" type="text" name="compra" value="<?=$produto['compra']?>"></td>
										</tr>
										<tr>
											<td>Valor da venda:</td>
											<td><input class="form-control mask-money" type="text" name="preco" value="<?=$produto['preco']?>"></td>
										</tr>
										<tr>
											<td>Descrição:</td>
											<td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
										</tr>
										<tr>
											<td>Quantidade em Estoque:</td>
											<td><input type="number" class="form-control" name="quantidade" value="<?=$produto['quantidade']?>"></td>
										</tr>
										<tr>
											<td>Usado</td>
											<td><input type="checkbox" name="usado" <?=$produto['usado'] ? 'checked' : '' ?> /> Usado
										</tr>
										<tr>
											<td>Categoria</td>
											<td>
												<select name="categoria_id" class="form-control">
													<?php foreach ($categorias as $categoria) :
														$essaEHACategoria = $produto['categoria_id'] == $categoria['id'];
														$selecao = $essaEHACategoria ? "selected='selected'" : ""; 

													?>
														<option	value="<?=$categoria['id']?>" <?=$selecao?>>
																<?=$categoria['nome']?>
														</option>
													<?php endforeach ?>
												</select>
										    </td>
										</tr>
										<tr>
											<td>Fornecedor</td>
											<td>
												<select class="form-control" name="fornecedor" class="fornecedor">
													<?php foreach ($fornecedores as $fornecedor) :?>
														<option	value="<?=$fornecedor?>" <?= $fornecedor == $produto['fornecedor'] ? 'selected' : '' ?> >
															<?=$fornecedor?>
														</option>
													<?php endforeach ?>
												</select>
										    </td>
										</tr>
										<tr>
											<td>	
												<button class="btn btn-primary" type="submit">Alterar</button>
											</td>	
											<td>
												<a href="produtos-lista.php" class="btn btn-danger">Cancelar</a>
											</td>
										</tr>
									</table>
								</form>
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
		</div><!--content-->
	</div><!--container-->
</body>
</html>