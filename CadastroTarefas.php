<?php
    session_start();
    if(!$_SESSION['usuarioLogado']){
        $retorno  = "<script>";
        $retorno .= "  alert('Você precisa estar logado para ter acesso a essa página.');";
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
          Whats task?
      </div>
    </div>
    
    <div class="row d-flex justify-content-center">
      <h3>Cadastro de Tarefas</h3>
    </div>

    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        
        <form id="FormCadTarefas">

          <div class="form-row row-md-4">
            <div class="form-group col-md-12">
              <label for="titulo">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo">
            </div>

            <div class="form-group col-md-12">
              <label for="descricao">Descrição</label>
              <textarea rows="5" cols="30" class="form-control" id="descricao" name="descricao"></textarea>
            </div> 

            <div class="form-group col-md-6">
              <label for="status">Status</label>
              <select id="status" class="form-control" name = "status">
                <option value="Pendente">Pendente</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Validando">Validando</option>
                <option value="Final">Final</option>
              </select>
            </div>
            
            <div class="form-group col-md-6">
              <label for="dataFechamento">Prazo</label>
              <input type="date" class="form-control" id="dataFechamento" name="dataFechamento">
            </div>

            <div class="form-group col-md-12">
                <label for="observacao">Observações</label>
                <textarea rows="5" cols="30" class="form-control" id="observacao" name="observacao"></textarea>
            </div>
          </div>  
          

          <button type="button" id="btnGravar" class="btn btn-primary">Gravar</button>
        </form>
      </div>
    </div>  
 
    <script src="js/jquery.js" ></script>
    <script src="js/bootstrap.min.js" ></script>

    <script>
      function gravarTarefa(){

        var titulo =  $("#titulo").val();
        var descricao =  $("#descricao").val();
        var status = $("#status").is(":selected");
        var dataFechamento = $("#dataFechamento").val();
        var observacao = $("#observacao").val();

        if (titulo == ""){
          alert ("titulo deve ser preenchido");
          $("#titulo").focus();
          return;
        }

        if (descricao == ""){
          alert ("descricao deve ser preenchido");
          $("#descricao").focus();
          return;
        }

        if (dataFechamento == ""){
          alert ("prazo deve ser preenchido");
          $("#dataFechamento").focus();
          return;
        }

        if (status){
          alert ("status deve ser preenchido");
          $("#status").focus();
          return;
        }

        var valStatus = $("#status").val();

        $.post("/taynaa/Tarefas.php", {funcao : 'gravarTarefa', titulo : titulo, descricao : descricao,
         dataFechamento : dataFechamento, status : valStatus, observacao : observacao}, function(data){

          if(data == "OK"){
            alert("Tarefa salva com sucesso.");
            $("#FormCadTarefas")[0].reset();
          }else{
            alert("Erro ao inserir novo usuário.");
          }

          return;
        });//post
      }//confirmarCadastro

      $("#btnGravar").click(function(e){
        e.preventDefault();

        gravarTarefa();
      });
    </script>

  </body>
</html>