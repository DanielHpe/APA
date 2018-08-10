<?php
  session_start();
  include('../conexao/conexao.php');
 ?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- <link rel="icon" href="" type="imagem/jpg"> -->

  	<!-- Bootstrap CSS -->
  	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css"> -->
  	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/login.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  </head>
  <body>
  <div class="container">
      <div class="col-md-4">
        <form class="" action="cadastro-rt.php" name="form" method="post">
          <div class="bg-box form-group">
              <h3>Cadastrar</h3>
              <hr>
              <div class="col-md-12 usuario">
                  <label for="">Usuário:</label>
                  <input type="text" name="nome" value="" class="form-control" placeholder="Usuário">
              </div>
              <div class="col-md-12 email">
                <label for="">Email: </label>
                <input type="text" name="email" value="" class="form-control" placeholder="Email">

              </div>
              <div class="col-md-12 senha">
                <label for="">Senha: </label>
                <input type="password" name="senha" value="" class="form-control" placeholder="Senha">

              </div>
              <div class="col-md-12 enviar">
                <button type="submit" name="button" class="btn" id="enviar">Enviar</button>
              </div>
              <div class="col-md-12 cancelar">
                  <a href="../index1.php" class="btn">cancelar</a>
              </div>
          </div>


        </form>
      </div>

      <div class="col-md-8 jumbotrom">
          <h3>Cadastro de Responsável Técnico</h3>
          <p>Nessa parte o Responsável Técnico faz o seu cadastro e assim pode anexar e analisar projetos para maior facilidade</p>

      </div>
    </div>

  </body>
</html>
