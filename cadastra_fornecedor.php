<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
	<script src="js/maskmoney.js"></script>
	<script src="js/mascara.js"></script>
	<script src="js/buscacp.js"></script>
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
										<input type="hidden" name="id" id="fornecedor_id" value="<?= $fornecedor['id'] ?>">
									<?php }?>

									<table class="table">
										<tr>
											<td>Nome:</td>
											 <td><input class="form-control" type="text" name="nome" value="<?= isset($fornecedor['nome']) ? $fornecedor['nome'] : '' ?>"></td>

											<td>CNPJ/CPF:</td>
											<td><input class="form-control mask-cnpj-cpf" type="text" id="cnpj" name="cnpj" value="<?= isset($fornecedor['cnpj']) ? $fornecedor['cnpj'] : '' ?>"></td>
										</tr>
										<tr>
											<td>Complemento:</td>
											 <td><input class="form-control" type="text" name="complemento" value="<?= isset($fornecedor['complemento']) ? $fornecedor['complemento'] : '' ?>"></td>

											<td>Bairro:</td>
											<td><input class="form-control" type="text" name="bairro" value="<?= isset($fornecedor['bairro']) ? $fornecedor['bairro'] : '' ?>"></td>
										</tr>
										<tr>
											<td>Cidade:</td>
											 <td><input class="form-control" type="text" name="cidade" value="<?= isset($fornecedor['complemento']) ? $fornecedor['complemento'] : '' ?>"></td>

											<td>Estado:</td>
											<td><input class="form-control" type="text" name="estado" value="<?= isset($fornecedor['estado']) ? $fornecedor['estado'] : '' ?>"></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><input class="form-control" type="text" name="email" value="<?= isset($fornecedor['email']) ? $fornecedor['email'] : '' ?>"></input></td>

											<td>Telefone</td>
											<td><input class="form-control mask-cel" name="telefone" value="<?= isset($fornecedor['telefone']) ? $fornecedor['telefone'] : '' ?>"></input></td>
										</tr>
										<tr>
											<td>Naturalidade</td>
											<td><input class="form-control" type="text" name="naturalidade" value="<?= isset($fornecedor['naturalidade']) ? $fornecedor['naturalidade'] : '' ?>"></input></td>

											<td>Produtos :</td>
											<td>
												<select name="produto" value="<?= isset($fornecedor['produto']) ? $fornecedor['produto'] : '' ?>">
													<option value="Tomada" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Tomada' ? 'selected' : '' ?>>Tomada</option>
													<option value="Lampada" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Lampada' ? 'selected' : '' ?>>Lampada</option>
													<option value="Fechadura" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Fechadura' ? 'selected' : '' ?>>Fechadura</option>
													<option value="Chuveiro" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Chuveiro' ? 'selected' : '' ?>>Chuveiro</option>
													<option value="Torneira" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Torneira' ? 'selected' : '' ?>>Torneira</option>
													<option value="Janelas de aluminio"> <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Janelas de aluminio' ? 'selected' : '' ?>Janelas de aluminio</option>
													<option value="Tinta" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Tinta' ? 'selected' : '' ?>>Tinta</option>
													<option value="Pincel" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Pincel' ? 'selected' : '' ?>>Pincel</option>
													<option value="Lixa" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Lixa' ? 'selected' : '' ?>>Lixa</option>
													<option value="Espatula" <?= isset($fornecedor['produto']) && $fornecedor['produto'] == 'Espatula' ? 'selected' : '' ?>>Espatula</option>
												</select>
											</td>
										
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
						//alert("fornecedor  com sucesso");
						window.location.replace("./fornecedores_lista.php");
					},
					error : (e) =>{
						console.log(e);
						alert("Problemas de conexao");
					}
				});
			});
			
			let botao = 'btnCad';
			
			if(!!$("#fornecedor_id").val()){
				$(`#${botao}`).hide();
			}

			$('#cnpj').keyup((e)=>{
				let texto = $('#cnpj').val();
				let campo = 'cnpj';
				let tabela = 'fornecedor';

				$.ajax({
					type: 'post',
					url: 'validacao.php',
					dataType: 'json',
					data: {
						texto : texto,
						campo : campo,
						tabela : tabela
					},
					success: (resultado) => {
						if(resultado){
							$(`#${botao}`).hide();
							alert(`Esse cnpj já está sendo utilizado !!`);
						}else{
							$(`#${botao}`).show();
						}
					},
					error : (e) =>{
						console.log(e);
					}
				});
			});
		});				
	</script>
</body>
</html>