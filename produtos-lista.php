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
							<h1>Lista de produtos - <a href="cadastra_produtos.php">NOVO</a></h1>

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
										$produtos = array_reverse($produtos);
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