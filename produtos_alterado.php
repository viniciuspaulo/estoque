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
							<?php include("conecta.php");
								  include("banco-categoria.php");

								  $categorias = listaCategorias($conexao);
    
							?>	  
							<h1>Cadastra produtos</h1>
								<form action="adicionar_produto.php" method="post">
									<table class="table">
										<tr>
											<td>Nome:</td>
											 <td><input class="form-control" type="text" name="nome"></td>
										</tr>
										<tr>
											<td>Preco:</td>
											<td><input class="form-control" type="number" name="preco"></td>
										</tr>
										<tr>
											<td>Descrição:</td>
											<td><textarea class="form-control" name="descricao"></textarea></td>
										</tr>
										<tr>
											<td></td>
											<td><input type="checkbox" name="usado" value="true"> Usado
										</tr>
										<tr>
											<td>Categoria</td>
											<td>
												<select name="categoria_id" class="form-control">
													<?php foreach ($categorias as $categoria) : ?>
														<option	value="<?=$categoria['id']?>">
																<?=$categoria['nome']?>
														</option>
													<?php endforeach ?>
												</select>
										    </tr>							
										<tr>
											<td>	
												<button class="btn btn-primary" type="submit">Cadastrar</button>
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