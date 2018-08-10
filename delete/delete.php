<?php 
require __DIR__.'\../conexao/conexao.php';

$id = $_GET['id'];
$nomeRelatorio = $_GET['nome'];

echo $id;
echo $nomeRelatorio;

$conexao->query("DELETE FROM dadosRelatorios WHERE idRelatorio = '".$id."'");

$conexao->query("DELETE FROM dadosReport WHERE nomeRelatorio = '".$nomeRelatorio."'");

header('Location: ../index.php');


?>