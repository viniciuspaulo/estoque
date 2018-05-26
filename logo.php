<?php session_start(); ?>
<div class="logo">
    <a href="logado.php">Usuário : <?= strtoupper($_SESSION['usuario_nome']); ?> </a>
</div>
<div class="adm">
    <li><a href="sair.php">Sair</a></li>
</div><!--adm-->