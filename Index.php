<?php
    session_start();
    if(isset($_SESSION['usuarioLogado'])){
        $retorno  = "<script>";
        $retorno .= "  window.location.href = 'ListagemTarefas.php' ";
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

    <title>Login - Whats task?</title>
  </head>
  <body>
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12 align-self-start topoPagina">
          Whats task?
        </div>
      </div> <!-- row -->

      <div class="row ">
        <div class="col-md-4 col-md-offset-4"></div>

        <form id="formLogin" method="POST" class="col-md-4 col-md-off-set-4">
          <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" class="form-control" id="usuario" name="usuario">
          </div>
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
          </div>
          
          <button type="button" id="btnEntrar" class="btn btn-primary">Entrar</button>
          <br>
          <a href="CadastroUsuarios.php" class="ls-login-forgot">Não tenho cadastro</a>
        </form>
      </div> <!-- row -->

    </div> <!-- container -->

    <script src="js/jquery.js" ></script>
    <script src="js/bootstrap.min.js" ></script>

    <script>
      function fazerLogin(){
        var usuario =  $("#usuario").val();
        var senha=  $("#senha").val();

        if (usuario == ""){
          alert ("usuario deve ser preenchido");
          $("#usuario").focus();
          return;
        }

        if (senha == ""){
          alert ("senha deve ser preenchido");
          $("#senha").focus();
          return;
        }

        $.post("/taynaa/login.php", {funcao : 'fazerLogin', usuario : usuario, senha : senha}, function(data){
          //console.log(data);return;
          if(data == "OK"){
            window.location.href = "ListagemTarefas.php"; //Voltar aqui
          }else{
            alert("Usuário e/ou senha inválidos");
            $("#usuario").focus();
          }
          
          return;
        });
      }//function fazerLogin

      $("#btnEntrar").click(function(e){
        e.preventDefault();

        fazerLogin();
      });
    </script>
  </body>

</html>
