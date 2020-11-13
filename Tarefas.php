<?php

    include 'classTarefas.php';
    include 'classBd.php';
    session_start();

    $bd = new bd('localhost','root','','agenda');
    $tarefas = new Tarefas();

    $tarefas->setFuncao(isset($_POST['funcao']) ? $_POST['funcao'] : null);
    $tarefas->setidUsuario(isset($_COOKIE['idUsuario']) ? $_COOKIE["idUsuario"] : null);
    $tarefas->settitulo(isset($_POST['titulo']) ? $_POST['titulo'] : null);
    $tarefas->setdescricao(isset($_POST['descricao']) ? $_POST['descricao'] : null);
    $tarefas->setobservacao(isset($_POST['observacao']) ? $_POST['observacao'] : null);
    $tarefas->setdataFechamento(isset($_POST['dataFechamento']) ? $_POST['dataFechamento'] : null);
    $tarefas->setdataAtualizacao(date('Y-m-d H:i:s'));
    $tarefas->setdataInsercao(date('Y-m-d H:i:s'));
    $tarefas->setstatus(isset($_POST['status']) ? $_POST['status'] : null);

    switch ($tarefas->getFuncao()){
        case 'listarTarefas':
            $tarefas->listarTarefas($bd, $tarefas->getidUsuario());
        case 'gravarTarefa':
            $tarefas->gravarTarefa($bd);

    }
    
?>