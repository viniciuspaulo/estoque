<?php include"conexao.php";?>
<html>
<head>
	<title>Controle de Cliente</title>
</head>
<body>
<?php
	$id = $_GET["id"];

	$sql = "SELECT * FROM clientes where id_clientes='$id'";
	$query = mysql_query($sql);
	$rows = mysql_fetch_array($query);

	$id = $rows["id_clientes"];
	$nome = $rows["nome_clientes"];
	$email = $rows["email_clientes"];
	$idade = $rows["idade_clientes"];
	$sexo = $rows["sexo_clientes"];
	$estado = $rows["estado_clientes"];	
?>	
	<h3>Alteração de Cliente</h3>
	<form method="post" action="alterar_clientes.php?id=<?php echo $id; ?>">
		<p>
			Nome: <input type="text"  size="40" name="nome" value="<?php echo $nome; ?>"/>
		</p>
		<p>
			E-mail:
			<input type="text" size="40" name="email" value="<?php echo $email; ?>"/>
		</p>
		<p>
			Sexo:
			<input type="radio" value="M" name="sexo"
			<?php 
			if($sexo == "M")
				echo "cheked";
			?>
			/>Masculino 
			<input type="radio" value="F" name="sexo"
			<?php 
			if($sexo == "M")
				echo "cheked";
			?>
			/>Feminino
		</p>
		<p>
			Idade:
				<select name="idade">
				<?php
				$idadeMax = 100;

				for($idade = 18; $idade <= $idadeMax;$idade++){
				?>
					<option value="<?php echo $idade. " anos"; ?>"><?php echo $idade." anos"; ?></option>
				<?php
				}
				?>					
				</select>
		</p>

		<p>
			Estado : 
				<select name="estado">
					<option value="AL">Alagoas</option>
					<option value="BA">Bahia</option>
					<option value="PE">Pernambuco</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="SP">São Paulo</option>
					
				</select>
		</p>
		<input type="submit"  value="alterar cliente">
	</form>
</body>
</html>