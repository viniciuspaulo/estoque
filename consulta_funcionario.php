<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>

</head>
<body>
	<div id="header">
		<div class="logo"><a href="logado.php">Admini<span>strador</span></a></div>
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
				<li><a href="cadastra_produtos.php">Fornecedor</a></li>
				<li><a href="produtos-lista.php">Produtos</a></li>
				<li><a href="cadastra_produtos.php">Compra</a></li>
				<li><a href="cadastra_produtos.php">Venda</a></li>
			</ul>
		</nav>	
	</div><!-- fim header-->
	<div id="container">
		<div class="sidebar">
			<ul id="sidebar-nav">
				<li><a href="cadastra_funcionario.php"><?php
								
								if(isset($_SESSION['adm'])){
									echo 'Cadastro';
								}
							?></a></li>
				<li><a href="consulta_funcionario.php">Consulta</a></li>
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
							<h1>Consulta funcionário</h1>

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
							            <th>Função</th>
							            <th>E-mail</th>
							            <th>Telefone</th>
							            <th>Alterar</th>
							            <th>Apagar</th>
							        </tr>
							    </thead>
							    <!--Table head-->

									<!--<?php
										$funcionarios = listafuncionario($conexao);
										foreach ($funcionarios as $funcionario) : 
									?>-->
									<tr>
										<td><?= $funcionario['nome'] ?></td>
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