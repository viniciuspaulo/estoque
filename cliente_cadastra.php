<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/cssutil.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include 'script.php' ?>
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
								$id = "";
								if(isset($_GET['id'])){
									$id = $_GET['id'];
									$sql = mysqli_query($conexao, "SELECT * FROM clientes WHERE cliente_id = '$id'");
									$cliente = mysqli_fetch_array($sql);
								}
							?>	  
							<h1>Cadastra Cliente</h1>
							<div id="cadastro">
							<form method="post" action="<?=$id ? 'cliente_alterar.php' : 'cliente_cadastra_controller.php'?> ">
									<table id="cad_table" cellspacing="5">

										<?php 
											if(isset($_GET['id'])){
										?>
											<input type="hidden" name="cliente_id" id="cliente_id" class="txt" value="<?=$cliente['cliente_id']?>" />
										<?php } ?>
										<tr>
											<td>Nome:</td>
											<td><input type="text" name="nome" id="nome" class="txt" value="<?=$id ? $cliente['nome'] : ''?>" /></td>

											<td>Email:</td>
											<td><input type="text" name="email" id="email" class="txt" value="<?=$id ? $cliente['email'] : ''?>" /></td>
										</tr>
										
										<tr>
											<td>Telef:</td>
											<td><input type="text" name="telefone" id="telefone" class="txt mask-cel" value="<?=$id ? $cliente['telefone'] : ''?>" /></td>

											<td>Cep:</td>
											<td><input type="text" name="cep" id="cep" class="txt" value="<?=$id ? $cliente['cep'] : ''?>" /></td>
										</tr>

										<tr>
											<td>Cpf/Cnpj:</td>
											<td><input type="text" name="cnpj" id="cnpj" class="txt mask-cnpj-cpf" value="<?=$id ? $cliente['cnpj'] : ''?>" /></td>

											<td>Complemento:</td>
											<td><input type="text" name="complemento" id="complemento" class="txt" value="<?=$id ? $cliente['complemento'] : ''?>" /></td>
										</tr>

										<tr>
											<td>Endereco:</td>
											<td><input type="text" name="endereco" id="endereco" class="txt" value="<?=$id ? $cliente['endereco'] : ''?>" /></td>

											<td>Numero:</td>
											<td><input type="number" name="numero" id="numero" class="txt" maxlength="15" value="<?=$id ? $cliente['numero'] : ''?>" /></td>
										</tr>

										<tr>
											<td>Cidade:</td>
											<td><input type="text" name="cidade" id="cidade" class="txt" maxlength="15" value="<?=$id ? $cliente['cidade'] : ''?>" /></td>

											<td>Estado:</td>
											<td><input type="text" name="estado" id="estado" class="txt" maxlength="2" value="<?=$id ? $cliente['cidade'] : ''?>" /></td>
										</tr>

										<tr>
											<td colspan="2"><input type="submit" value="<?=$id ? 'Alterar' : 'Cadastrar'?>" id="btnCad"> 
											&nbsp;
											<a href="cliente_lista.php" class="btn">Cancelar</a>
											</td>
										</tr>	
										</tr>	
									</table>
								</form>
							</div>
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
		</div><!--content-->
	</div><!--container-->
</body>
</html>