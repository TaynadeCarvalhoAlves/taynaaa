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
      <h3>Cadastro de Usuários</h3>
    </div>

    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        
        <form id="FormCadUsuario">

          <div class="form-row row-md-4">
            <div class="form-group col-md-12">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-group col-md-12">
              <label for="confirmeEmail">Confirme seu email</label>
              <input type="email" class="form-control" id="confirmeEmail" name="confirmeEmail">
            </div>

            <div class="form-group col-md-6">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha" name="Senha">
            </div>
            
            <div class="form-group col-md-6">
              <label for="confirmeSenha">Confirme sua senha</label>
              <input type="password" class="form-control" id="confirmeSenha" name="ConfirmeSenha">
            </div>
          </div>  
          
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="usuario">Usuário</label>
              <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            
            <div class="form-group col-md-6">
              <label for="setor">Setor</label>
              <select id="setor" class="form-control" name = "setor">
                <option value="1">Administração</option>
                <option value="2">Contabilidade</option>
                <option value="3">BI</option>
                <option value="4">Infraestrutura</option>
              </select>
            </div>
          </div>

          <button type="button" id="btnGravar" class="btn btn-primary">Gravar</button>
        </form>
      </div>
    </div>  
 
    <script src="js/jquery.js" ></script>
    <script src="js/bootstrap.min.js" ></script>

    <script>
      function confirmarCadastro(){

        var email =  $("#email").val();
        var confirmeEmail=  $("#confirmeEmail").val();
        var senha =  $("#senha").val();
        var confirmeSenha =  $("#confirmeSenha").val();
        var nome =  $("#nome").val();
        var usuario =  $("#usuario").val();
        var setor = $("#setor").is(":selected");

        if (email == ""){
          alert ("email deve ser preenchido");
          $("#email").focus();
          return;
        }

        if (confirmeEmail == ""){
          alert ("confirmeEmail deve ser preenchido");
          $("#confirmeEmail").focus();
          return;
        }

        if (senha == ""){
          alert ("senha deve ser preenchido");
          $("#senha").focus();
          return;
        }

        if (confirmeSenha == ""){
          alert ("confirmeSenha deve ser preenchido");
          $("#confirmeSenha").focus();
          return;
        }

        if (nome == ""){
          alert ("nome deve ser preenchido");
          $("#nome").focus();
          return;
        }

        if (usuario == ""){
          alert ("usuario deve ser preenchido");
          $("#usuario").focus();
          return;
        }

        if (setor){
          alert ("setor deve ser preenchido");
          $("#setor").focus();
          return;
        }

        if(email != confirmeEmail){
          alert("Confirmação de email inválida.");
          $("#confirmeEmail").focus();
          return;
        }
      
        if(senha != confirmeSenha){
          alert("Confirmação de senha inválida.");
          $("#confirmeSenha").focus();
          return;
        }

        var idsetor = parseInt($("#setor").val());

        $.post("/taynaa/Usuarios.php", {funcao : 'gravaUsuario', email : email, usuario : usuario, senha : senha, nome : nome, idsetor : idsetor}, function(data){
          
          if(data == "OK"){
            alert("Usuário salvo com sucesso.");
            $("#FormCadUsuario")[0].reset();
          }else{
            alert("Erro ao inserir novo usuário.");
          }

          return;
        });//post
      }//confirmarCadastro

      $("#btnGravar").click(function(e){
        e.preventDefault();

        confirmarCadastro();
      });
    </script>

  </body>
</html>