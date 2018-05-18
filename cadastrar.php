<?php
$host="localhost";
$user = "root";
$pass = "";
$banco = "construcao";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_errno());
?>

<?php
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$adm=$_POST['adm'];
$telefone=$_POST['telefone'];
$cep=$_POST['cep'];
$rua=$_POST['rua'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];

if(empty($nome)){
		echo "<script>alert('Campo nome não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($email)){
		echo "<script>alert('Campo E-mail não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($senha)){
		echo "<script>alert('Campo senha não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($adm)){
		echo "<script>alert('Campo Adm não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($telefone)){
		echo "<script>alert('Campo telefone não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($cep)){
		echo "<script>alert('Campo cep não foi preenchido corretamente'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($rua)){
		echo "<script>alert('Campo rua não foi preenchido corretamente'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($bairro)){
		echo "<script>alert('Campo bairro não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($cidade)){
		echo "<script>alert('Campo cidade não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}elseif(empty($uf)){
		echo "<script>alert('Campo estado não foi preenchido corretamente.'); history.back();</script>";
		header("Location: cadastra_funcionario.php");
	}else{

$sql = mysql_query("INSERT INTO funcionario(nome, email, senha, adm, telefone, cep, rua, bairro, cidade, uf) 
VALUES('$nome','$email', '$senha', '$adm', '$telefone', '$cep', '$rua', '$bairro', '$cidade', '$uf')");
echo "<center><h1> Cadastrado com sucesso </h1></center>";

}
?>

	