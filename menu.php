<?php 
    if(!isset ($_SESSION['usuario_email']) && !isset($_SESSION['usuario_nome']))
    {
        unset($_SESSION['usuario_email']);
        unset($_SESSION['usuario_nome']);
        header('location:index.php');
    }
