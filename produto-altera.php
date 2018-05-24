<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>

</head>
<body>
	<div id="header">
		<div class="logo"><a href="produtos.php">Admini<span>strador</span></a></div>
		<div class="adm">
			<li><a href="#"><span><?php
								session_start();
								
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
											<td>Preço:</td>
											<td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"></td>
										</tr>
										<tr>
											<td>Descrição:</td>
											<td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
										</tr>
										<tr>
											<td></td>
											<td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
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