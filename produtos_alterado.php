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
			<ul>
				<li><a href="produtos.php">Cadastro</a></li>
				<li><a href="produtos-lista.php">Produtos</a></li>
				<li><a href="#">Compra</a></li>
				<li><a href="#">Venda</a></li>
				<li><a href="#">Cliente</a></li>
				<li><a href="#">Funcionário</a></li>
			</ul>
		</nav>	
	</div><!-- fim header-->
	<div id="container">
		<div class="sidebar">
			<ul id="sidebar-nav">
				<li><a href="logado.php">Funcionários</a></li>
				<li><a href="">Produtos</a></li>
				<li><a href="">Fornecedor</a></li>
				<li><a href="">Cliente</a></li>

			</ul><!--sidebar-nav-->
			
		</div><!-- fim sidebar-->
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