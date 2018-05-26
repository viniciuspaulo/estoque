<ul id="sidebar-nav">
    <?php if ($_SESSION['perfil'] == '2') { ?>
    <li><a href="funcionario_lista.php">Funcionario</a></li>
    <?php }?>
    <li><a href="cliente_lista.php">Clientes</a></li>
    <li><a href="fornecedores_lista.php">Fornecedores</a></li>
    <li><a href="produtos-lista.php">Produtos</a></li>
    <li><a href="vendas_lista.php">Vendas</a></li>
</ul>