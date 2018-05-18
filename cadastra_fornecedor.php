<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
	<script>
		//Mascara CPF
		$(document).ready(function(){
			$('.mask-cpf').mask("99.999.999/9999-99");
			$('.mask-cpf').mask("99.999.999/9999-99");
		});
	</script>
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
				<li><a href="cadastra_produtos.php">Cadastro</a></li>
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
				<li><a href="cadastra_funcionario.php">Funcionários</a></li>
				<li><a href="cadastra_produtos.php">Produtos</a></li>
				<li><a href="cadastra_fornecedor.php">Fornecedor</a></li>
				<li><a href="cadastra_cliente.php">Cliente</a></li>

			</ul><!--sidebar-nav-->
			
		</div><!-- fim sidebar-->
		<div class="content">
			<h1>Sigemac</h1>
			<p>Sistema de Gestão de Material de Construção</p>



			<?php include("conecta.php");

				if( isset($_GET["id"]) ){
					$fornecedor = mysqli_query($conexao, "select * from fornecedor where id = '".$_GET["id"]."' ");
					$fornecedor = mysqli_fetch_assoc($fornecedor);
				}
				
			?>

			<div id="box">
				<div class="box-top"></div><!--box-top-->
				<div class="box-painel">
					<div class="container"><!--centralizar-->
						<div class="principal"> 
							<h1>Cadastra fornecedor</h1>
								<form>
									
									<?php if(isset($fornecedor['id']) ) { ?>
										<input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">
									<?php }?>

									<table class="table">
										<tr>
											<td>Nome:</td>
											 <td><input class="form-control" type="text" name="nome" value="<?= isset($fornecedor['nome']) ? $fornecedor['nome'] : '' ?>"></td>
										</tr>
										<tr>
											<td>CNPJ:</td>
											<td><input class="form-control mask-cpf" type="text" name="cnpj" value="<?= isset($fornecedor['cnpj']) ? $fornecedor['cnpj'] : '' ?>"></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><input class="form-control" name="email" value="<?= isset($fornecedor['email']) ? $fornecedor['email'] : '' ?>"></input></td>
										</tr>
										<tr>
											<td>Telefone</td>
											<td><input class="form-control" name="telefone" value="<?= isset($fornecedor['telefone']) ? $fornecedor['telefone'] : '' ?>"></input></td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="submit" value="<?= isset($fornecedor['id']) ? 'Atualizar' : 'Cadastrar' ?>" id="btnCad" class="btn btn-primary"> 
												&nbsp;
												<a href="./fornecedores_lista.php">
													<input type="button" value="Cancelar" class="btn btn-danger" id="btnCancelar">
												</a>
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
	<script type="text/javascript">
		$(function () {

			$('form').on('submit', function (e) {
				e.preventDefault();
				$.ajax({
					type: 'post',
					url: 'adicionar_fornecedor.php',
					data: $('form').serialize(),
					success: (e) => {
						alert("fornecedor cadastrado com sucesso");
						window.location.replace("./fornecedores_lista.php");
					},
					error : (e) =>{
						alert("Problemas de conexao");
					}
				});
			});
		});				
	</script>
</body>
</html>