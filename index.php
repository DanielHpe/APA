<?php
include('./conexao/conexao.php');
require_once("validando_sessao.php");
	if(isset($_GET['sair'])){
		session_destroy();
		header("Location: index1.php");
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Análise de Projetos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="icon" href="" type="imagem/jpg"> -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" crossorigin="anonymous"></script> -->
	<link href="./fontawesome/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/documentacao.css">

	<!-- <link rel="stylesheet" href="css/smartphones.css"> -->
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script> -->
	<!-- <link rel="stylesheet" href="css/smartphones.css"> -->
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"> -->
</head>
<body>
	<img src="./img/projeto.jpg" class="img" style="position:fixed; z-index: -99; background-attachment: fixed;  opacity: 0.3; border: 1px solid #aaa;" alt="Projeto Arquitetônico">

	<!-- background preto quando 'Cadastrar projeto' for acionado  -->
	<div class="bg-body"></div>

	<!-- tela de loading  -->
	<div class="container-fluid carregando"><h2><i class="fas fa-spinner fa-pulse"></i> Carregando...</h2></div>

	<!-- Modal confirmação -->
	<div class="modal-confirmacao animated fadeInDown"><h3><i class="fa fa-check"></i> Relatório Gerado com Sucesso!</h3></div>


<!-- Menu Lateral fixo  -->
<div class="row-fluid">
	<?php require('header/header.php') ?>
	<!-- Modal de cadastro de projetos  -->
	<?php require('modal/modal.php') ?>
	
	<?php require('modal/relatorio-modal.php') ?>
	

</div>


<!-- Scripts javascript  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/efeitos.js"></script>

<!-- <script type="text/javascript" src="js/jquery.mask.min.js"></script> -->
<script defer src="./fontawesome/fontawesome-free-5.0.13/svg-with-js/js/fontawesome-all.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>


<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
</body>
</html>
