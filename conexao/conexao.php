<?php
// session_start();
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'tcc';

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco);
$selecao = mysqli_select_db($conexao,$banco);


if(!$conexao){
  echo "Erro ao Conectar com o Banco Teste";
}

  ?>
