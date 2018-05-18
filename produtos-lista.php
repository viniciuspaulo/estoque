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
				<li><a href="cadastra_funcionario.php">Funcionários</a></li>
				<li><a href="cadastra_cliente.php">Cliente</a></li>
				<li><a href="#">Fornecedor</a></li>
				<li><a href="">Produtos</a></li>
				<li><a href="#">Compra</a></li>
				<li><a href="cadastra_produtos.php">Venda</a></li>
			</ul>
		</nav>	
	</div><!-- fim header-->
	<div id="container">
		<div class="sidebar">
			<ul id="sidebar-nav">
				<li><a href="cadastra_produtos.php">Cadastrar</a></li>
				<li><a href="#">Fornecedor</a></li>

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
							<h1>Lista de produtos</h1>

							<?php include("conecta.php");
							      include("banco-produto.php"); ?>

							    <?php
							    	if(array_key_exists("removido", $_GET) && $_GET["removido"]==true) {
							    ?>
							    		<p class="alert-success">produto removido com sucesso!</p>
							    <?php
							    	}
							    ?>
								<table class="table">
							    <!--Table head-->
							    <thead>
							        <tr>
							            <th>Nome</th>
							            <th>Preço</th>
							            <th>Descrição</th>
							            <th>Categoria</th>
							            <th>Alterar</th>
							            <th>Apagar</th>
							        </tr>
							    </thead>
							    <!--Table head-->

									<?php
										$produtos = listaProdutos($conexao);
										foreach ($produtos as $produto) : 
									?>
									<tr>
										<td><?= $produto['nome'] ?></td>
										<td><?= $produto['preco'] ?></td>
										<td><?= substr($produto['descricao'],0 ,40) ?></td>
										<td><?= $produto['categoria_nome']?></td>
										<td><a class="btn btn-primary"  href="produto-altera.php?id=<?=$produto['id']?>">alterar</a></td>


										<td>
											<form action="remove-produto.php" method="post">
												<input type="hidden" name="id" value="<?=$produto['id']?>">
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