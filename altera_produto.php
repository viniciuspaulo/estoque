<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/.css"/>

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
			<h1>Dashboard</h1>
			<p>Sistema de Gestão de Material de Construção</p>

			<div id="box">
				<div class="box-top"></div><!--box-top-->
				<div class="box-painel">
					<div class="container"><!--centralizar-->
						<div class="principal">
	<?php include("conecta.php"); ?>
	<?php include("banco-produto.php");
	
	$id =  $_POST['id'];
	$nome =  $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];
	if(array_key_exists('usado', $_POST)) {
		$usado = "true";
}else{
	$usado = "false";

	}

	if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
		<p class="alert-success">produto <?php echo $nome;?>, <?php echo $preco; ?>alterado com sucesso!</p>
	<?php } else { ?>
		<p class="alert-danger">produto <?php echo $nome;?> não foi alterado!</p>
	<?php
	}

	mysqli_close($conexao);

	?>
	
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
			
		</div><!--content-->
	</div><!--container-->
</body>
</html>