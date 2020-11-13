<?php

    include 'classUsuarios.php';
    include 'classBd.php';

    $bd = new bd('localhost','root','','agenda');
    $usuarios = new Usuarios();

    $usuarios->setFuncao($_POST['funcao']);
    $usuarios->setEmail($_POST['email']);
    $usuarios->setNome($_POST['nome']);
    $usuarios->setUsuario($_POST['usuario']);
    $usuarios->setSenha($_POST['senha']);
    $usuarios->setidSetor($_POST['idsetor']);

    switch ($usuarios->getFuncao()){
        case 'gravaUsuario':
            $usuarios->gravaUsuario($bd);
    }
    
?>