<html>
<head>
	<meta charset="utf-8">
	<title>Sistema</title>
	<link rel="stylesheet"  href="css/bootstrap.css"/>
	<link rel="stylesheet"  href="css/sistema.css">
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Constrol LTD</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="produto-formulario.php">Adicionar Produto</a></li>
					<li><a href="produto-lista.php">Produtos</a></li>
					<li><a href="produto-formulario.php">Adicionar Produto</a></li>
					<li><a href="cadastroNovo.php"><span><?php
								session_start();

								if(isset($_SESSION['adm'])){
									echo 'Cadastrar Usuário';
								}
							?></span></a></li>
					<li><a href="sair.php">Sair</a></li>
					<li><a	href="#"><span><?php
								
								if(isset($_SESSION['adm'])){
									echo 'Adm: '.$_SESSION['adm'].'';
								}else if(isset($_SESSION['nor'])){
									echo 'User: '.$_SESSION['nor'].'';
								}
							?></span></a></li>
					
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="principal">