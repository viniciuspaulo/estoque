<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<script src="js/jquery.js"></script>
	<style>
		.pesquisar{
			padding : 10px;
			max-width : 400px;
		}
	</style>
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
							<h1>Consulta funcionário - <a href="funcionario_cadastra.php">NOVO</a></h1>

							<br>
							<div class="form-group pesquisar">
								<input type="text" id="pesquisar" class="form-control" placeholder="Pesquisar funcionario pelo o nome">
							</div>
							<br>

							<?php include "funcionario_banco.php"; $funcionarios = listaFuncionario($conexao); ?>
							<script type="text/javascript">
								var funcionarios = <?php echo json_encode($funcionarios); ?>;
							</script>
								<table class="table">
							    <thead>
							        <tr>
							            <th>Nome</th>
							            <th>CPF</th>
							            <th>E-mail</th>
							            <th>Alterar</th>
							            <th>Apagar</th>
							        </tr>
							    </thead>
									<?php foreach ($funcionarios as $funcionario) : ?>
									<tr>
										<td><?= $funcionario['nome'] ?></td>
										<td><?= $funcionario['cpf'] ?></td>
										<td><?= $funcionario['email'] ?></td>
										<td><a class="btn btn-primary"  href="./funcionario_cadastra.php?id=<?=$funcionario['funcionario_id']?>">alterar</a></td>

										<td>
											<form action="funcionario_remove.php" method="post">
												<input type="hidden" name="funcionario_id" value="<?=$funcionario['funcionario_id']?>">
												<button  class="btn btn-danger">remover</button>
											</form>	
										</td>	
									</tr>	
									<?php endforeach ?>
								</table>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	
		$('#pesquisar').blur(() =>{
			let nome = $("#pesquisar").val();
			let funcionario = funcionarios.find(funcionario => funcionario.nome.toLowerCase().indexOf(nome.toLowerCase()) > -1);
			if(!funcionario){
				cpf = nome.replace(".","");
				funcionario = funcionarios.find(funcionario => funcionario.cpf.replace(".","").toLowerCase().indexOf(cpf.toLowerCase()) > -1);
			}
			
			if(funcionario){
				document.location = `funcionario_cadastra.php?id=${funcionario.funcionario_id}`;
			}else{
				if(confirm("Deseja cadastrar um novo funcionario ?")){
					document.location = `funcionario_cadastra.php`;
				}
			}
		})

	</script>
</body>
</html>