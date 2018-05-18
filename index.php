<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sistema de Login</title>
  <link rel="stylesheet" href="css/query.css">
  <script src="js/login.js"></script>
</head>
<body>
    <div class="title"><h1>Constru Mar</h1></div>
    <div class="container">
            <div class="left"></div>
            <div class="right">
                <div class="formBox">
                    <form method="post" action="conexao.php">
                        <p>User Name</p>
                        <input type="text" name="email" placeholder="online"/><br>
                        <p>Senha</p>
                        <input type="password" name="senha" placeholder="..."><br>
                        <input type="submit"  value="Entrar" />
                    </form>
                </div>
            </div>    
    </div><!-- fim container-->
</body>
</html>