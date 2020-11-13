<?php

    include 'classLogin.php';
    include 'classBd.php';

    $bd = new bd('localhost','root','','agenda');
    $login = new Login();

    $login->setFuncao($_POST['funcao']);
    $login->setusuario($_POST['usuario']);
    $login->setsenha($_POST['senha']);

    switch ($login->getFuncao()){
        case 'fazerLogin':
            $login->fazerLogin($bd);
    }
    
?>