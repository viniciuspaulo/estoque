<?php

	//mysql_connect('localhost','root','') or die(mysql_error());
	//mysql_select_db('tcc2') or die(mysql_error());



	if(isset($_POST['email']) && isset($_POST['senha'])){
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		//$get = mysql_query("SELECT * FROM funcionario WHERE email = '$email' AND senha = '$senha'");
		//$num = mysql_num_rows($get);

		//if($num == 1){
			//while($percorer = mysql_fetch_array($get)){
				$adm = $percorer['adm'];
				$nome  = $percorer['nome'];

				session_start();

				if($adm == 1){
					$_SESSION['adm'] = $nome;
				}else{
					$_SESSION['nor'] = $nome;
				}

				header("Location: logado.php");
			//}
		// }else{
		// 		header("Location: index.php");

		// }

	}
?>