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
				<li><a href="produtos-lista.php">Produtos</a></li>
				<li><a href="produtos.php">Cadastra P</a></li>
				<li><a href="#">Estoque</a></li>
				<li><a href="#">Fornecedor</a></li>
				<li><a href="#">Cliente</a></li>
				<li><a href="#">Funcionário</a></li>
			</ul>
		</nav>	
	</div><!-- fim header-->
	<div id="container">
		<div class="sidebar">
			<ul id="sidebar-nav">
				<li><a href="">Dasboard</a></li>
				<li><a href="">Endereço</a></li>
				<li><a href="">Retornos</a></li>
				<li><a href="">Entradas</a></li>
				<li><a href="">Reclamações</a></li>
				<li><a href="">Gerentes</a></li>
				<li><a href="">Auxiliares</a></li>
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
							      include("banco-produto.php");

							$id = $_POST['id'];
							removeProduto($conexao, $id);
							header("Location: produtos-lista.php?removido=true") or die();
							
							?>
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
			
		</div><!--content-->
	</div><!--container-->
</body>
</html>							