<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>

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
				<li><a href="cadastra_produtos.php"><?php
								
								if(isset($_SESSION['adm'])){
									echo 'Cadastro';
								}
							?></a></li>
				<li><a href="produtos-lista.php">Consulta</a></li>
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
								  include("banco-categoria.php");

								  $categorias = listaCategorias($conexao);
    
							?>	  
							<h1>Cadastra produto</h1>
								
									<div id="cadastro">
										<form method="post" action="adicionar_produto.php">
											<table id="cad_tabla_prod">
												<tr>
													<td>Nome:</td>
													<td><input type="text" name="nome" id="nome" class="txt" /></td>
												</tr>
												<tr>
													<td>Preço:</td>
													<td><input type="number" name="preco" id="preco" class="txt" /></td>
												</tr>
												<tr>
													<td>Descrição:</td>
													<td><textarea name="descricao" id="descricao" class="txt"/></textarea></td>
												</tr>

												<tr>
													<td></td>
													<td><input type="checkbox" name="usado" value="true">usado
												</tr>																								
												<tr>
													<td>Categoria:</td>
													<td>
														<select name="categoria_id">
															<?php foreach ($categorias as $categoria) : ?>
																<option value="<?=$categoria['id']?>">
																	<?=$categoria['nome']?>
																</option> 
															<?php endforeach ?>
														</select>
													</td>
												</tr>

												<tr>
													<td colspan="2"><input type="submit" value="Cadastrar" id="btnCad"> 
													&nbsp;
													<a href="./">
														<input type="button" value="Cancelar" class="btn" id="btnCancelar">
													</a>
												</td>
												</tr>	
											</table>
										</form>
									</div>

								</form>
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
		</div><!--content-->
	</div><!--container-->
</body>
</html>