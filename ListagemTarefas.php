<?php
    session_start();
    if(!$_SESSION['usuarioLogado']){
        $retorno  = "<script>";
        $retorno .= "  alert('Você precisa estar logasdo para ter acesso a essa página.');";
        $retorno .= "  window.location.href = 'index.php' ";
        $retorno .= "</script>";
        die($retorno);
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 align-self-start topoPagina">
                <a href="CadastroTarefas.php" style="color: white; text-decoration: none;"> Whats task? </a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <h3>Tarefas</h3>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10" id="cartoesTarefas">
            
            </div>
        </div>
    </div> <!-- container-fluid -->

    <script src="js/jquery.js" ></script>
    <script src="js/bootstrap.min.js" ></script>

    <script>
        function listarTarefas(){
            $.post("/taynaa/Tarefas.php", {funcao : 'listarTarefas'}, function(data){
                $("#cartoesTarefas").html(data);
            });
        }//function listarTarefas

        listarTarefas();
    </script>

    </body>
</html>