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
									$sql = mysqli_query($conexao, "SELECT * FROM funcionario WHERE funcionario_id = '$id'");
									$funcionario = mysqli_fetch_array($sql);
								}
							?>	  
							<h1>Cadastra Funcionário</h1>
	
									<div id="cadastro">
										<form method="post" action="<?=$id ? 'funcionario_alterar.php' : 'funcionario_cadastra_controller.php'?> ">
											<table id="cad_table" cellspacing="5">

												<?php 
													if(isset($_GET['id'])){
												?>
													<input type="hidden" name="funcionario_id" id="funcionario_id" class="txt" value="<?=$funcionario['funcionario_id']?>" />
												<?php } ?>

												<input type="hidden" name="cargo" id="cargo" class="txt" value="0"  />

												<tr>
													<td>Nome:</td>
													<td><input type="text" name="nome" id="nome" class="txt" value="<?=$id ? $funcionario['nome'] : ''?>" /></td>

													<td>CPF:</td>
													<td><input type="text" name="cpf" id="cpf" class="txt mask-cpf" value="<?= $id ? $funcionario['cpf'] : ''?>" /></td>
												</tr>

												<tr>
													<td>Cep:</td>
													<td><input type="text" name="cep" id="cep" class="mask-cep txt" value="<?= $id ? $funcionario['cep'] : ''?>"/></td>

													<td>Endereço:</td>
													<td><input type="text" name="endereco" id="endereco" class="txt" value="<?= $id ? $funcionario['endereco'] : ''?>" /></td>
												</tr>

												<tr>
													<td>Numero:</td>
													<td><input type="number" name="numero" id="numero" class="txt" value="<?= $id ? $funcionario['numero'] : ''?>"/></td>

													<td>Complemento:</td>
													<td><input type="text" name="complemento" id="complemento" class="txt" value="<?= $id ? $funcionario['complemento'] : ''?>"/></td>
												</tr>

												<tr>
													<td>Bairro:</td>
													<td><input type="text" name="bairro" id="bairro" class="txt" value="<?= $id ? $funcionario['bairro'] : ''?>" /></td>

													<td>Estado:</td>
													<td><input type="text" name="estado" id="estado" class="txt" value="<?= $id ? $funcionario['estado'] : ''?>" /></td>
												</tr>

												<tr>
													<td>Cargo:</td>
													<td>
														<select name="perfil" id="perfil" class="form-control" value="<?= isset($funcionario['perfil']) ? $funcionario['perfil'] : '' ?>">
															<option value="1" <?= isset($funcionario['perfil']) && $funcionario['perfil'] == '1' ? 'selected' : '' ?>>Vendedor</option>
															<option value="2" <?= isset($funcionario['perfil']) && $funcionario['perfil'] == '2' ? 'selected' : '' ?>>Administrador</option>
															<option value="3" <?= isset($funcionario['perfil']) && $funcionario['perfil'] == '3' ? 'selected' : '' ?>>Estoquista</option>
														</select>
													</td>

													<td>Data Admissao:</td>
													<td><input type="date" name="dataadmissao" id="dataadmissao" class="txt" value="<?= $id ? $funcionario['dataadmissao'] : ''?>" /></td>
												</tr>

												<tr>
													<td>Data Desligamento:</td>
													<td><input type="date" name="datadesligamento" id="datadesligamento" class="txt" value="<?= $id ? $funcionario['datadesligamento'] : ''?>"/></td>

													<td>Matricula :</td>
													<td><input class="form-control" id="matricula" type="number" name="matricula" value="<?= isset($funcionario['matricula']) ? $funcionario['matricula'] : '' ?>"></td>
												</tr>

												<tr>
													<td>Email :</td>
													<td><input type="text" name="email" id="email" class="txt" value="<?= $id ? $funcionario['email'] : ''?>" /></td>

													<td>Telefone :</td>
													<td><input type="text" name="telefone" id="telefone" class="txt mask-cel" value="<?= $id ? $funcionario['telefone'] : ''?>" /></td>
												</tr>

												<tr>
													<td>Senha :</td>
													<td><input class="form-control" id="senha" type="password" name="senha" value="<?= isset($funcionario['senha']) ? $funcionario['senha'] : '' ?>"></td>
												</tr>
										
												<tr>
													<td colspan="2"><input type="submit" value="<?=$id ? 'Alterar' : 'Cadastrar'?>" id="btnCad"> 
													&nbsp;
													<a href="funcionario_lista.php" class="btn">Cancelar</a>
													</td>
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