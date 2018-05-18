<html>
<head>
	<title>Painel admin</title>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
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
				<li><a href="cadastra_funcionario.php">Funcionários</a></li>
				<li><a href="cadastra_cliente.php">Cliente</a></li>
				<li><a href="#">Fornecedor</a></li>
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
							<?php include("conecta.php");
						
			
							?>	  
							<h1>Cadastra Funcionário</h1>

									<div id="cadastro">
										<form method="post" action="cadastrar.php">
											<table id="cad_table">
												<tr>
													<td>Nome:</td>
													<td><input type="text" name="nome" id="nome" class="txt" /></td>
												</tr>
												<tr>
													<td>Email:</td>
													<td><input type="text" name="email" id="email" class="txt" /></td>
												</tr>
												<tr>
													<td>Senha:</td>
													<td><input type="password" name="senha" id="senha" class="txt" /></td>
												</tr>
												<tr>
													<td>Adm:</td>
													<td><input type="text" name="adm" id="adm" class="txt" /></td>
												</tr>																								
												<tr>
													<td>Telef:</td>
													<td><input type="text" name="telefone" id="telefone" class="txt" /></td>
												</tr>
												<tr>
													<td>Cep:</td>
													<td><input type="text" name="cep" id="cep" class="txt" /></td>
												</tr>																																				
												<tr>
													<td>Rua:</td>
													<td><input type="text" name="rua" id="rua" class="txt" /></td>
												</tr>
												<tr>
													<td>Bairro:</td>
													<td><input type="text" name="bairro" id="bairro" class="txt" maxlength="15" /></td>
												</tr>
												<tr>
													<td>Cidade:</td>
													<td><input type="text" name="cidade" id="cidade" class="txt" maxlength="15" /></td>
												</tr>
												<tr>
													<td>Estado:</td>
													<td><input type="text" name="uf" id="uf" class="txt" maxlength="2" /></td>
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
						</div><!--principal-->		
					</div><!--container-->	
				</div><!--box-painel-->	
			</div><!--box-->
		</div><!--content-->
		
	</div><!--container-->
</body>
</html>