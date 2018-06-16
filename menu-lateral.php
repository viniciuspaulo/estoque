<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<ul id="sidebar-nav">
    <li><a href="home.php"><span class="fa fa-home" style="font-size:20px"></span>Inicio</a></li>
    
    <?php if ($_SESSION['perfil'] == '2') { ?>
        <li><a href="funcionario_lista.php"><span class="fa fa-user" style="font-size:20px"></span>Funcionario</a></li>
    <?php }?>

    <?php if ($_SESSION['perfil'] != '3') { ?>
        <li><a href="cliente_lista.php"><span class="fa fa-users" style="font-size:20px"></span>Clientes</a></li>
    <?php }?>

        <li><a href="fornecedores_lista.php"><span class="fa fa-truck" style="font-size:20px"></span>Fornecedores</a></li>
        <li><a href="produtos-lista.php"><span class="fa fa-shopping-basket" style="font-size:20px"></span>Produtos</a></li>
    <?php if ($_SESSION['perfil'] != '3') { ?>
        <li><a href="vendas_lista.php"><span class="fa fa-shopping-cart" style="font-size:20px"></span>Vendas</a></li>
    <?php }?>
</ul>