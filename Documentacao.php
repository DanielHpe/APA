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

</head>

<body>
<img src="./img/projeto.jpg" class="img" style="position:fixed; z-index: -99; background-attachment: fixed;  opacity: 0.3; border: 1px solid #aaa;" alt="Projeto Arquitetônico">

<div class="row-fluid">
	<div  class="col-md-2 col-xs-12 bg-menu" >
	    <div class="menu collapse navbar-collapse"  id="navbar-1">
	        <ul class="nav nav-pills nav-stacked">
	            <li class="nav-item active"><a href="index.php" class="nav-link">Ínicio</a></li>
	            <li class="nav-item"><a href="#" id="hover" class="nav-link">Regras <span class="caret"></span></a>
	                <ul class="dropdown">
	                    <li><a href="Documentacao.php" >Documentacao</a></li>
	                    <li><a href="#" id="data-extration">Data Extraction</a></li>
	                </ul>
	            </li>
	            <li class="nav-item"><a href="https://drive.google.com/uc?authuser=0&id=15s2syhJVQ9x56b8qxD8TVnyD1eyrJWA5&export=download" class="nav-link">Legislação</a></li>
	            <li class="nav-item"><a href="" class="nav-link">Agradecimentos</a></li>
	        </ul>
	    </div>
	    <div class="col-md-2 col-xs-12 direitos">
	        <p>Todos os direitos reservados á Raul Lages e Daniel Pereira</p>
	    </div>
</div>

<div class="col-md-10 col-md-offset-2" style="position:fixed; z-index: 0">
    <header class="row header">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                </button>
                    <a href="index.php" class="navbar-brand">Análise de Projetos Arquitetônicos</a>
            </div>
            <div class="sair text-center" style="margin-top: 5px;">
                <a href="?sair">
                    <span class="glyphicon glyphicon-log-out" aria-hidden="true" title="Sair"></span>
                    <texto><?php echo $_SESSION['nome_usuario'] ?></texto><br>
                    <span>CAU: 1066AB39</span>
                </a>
            </div>
    </header>
    <!-- <hr> -->
        
	</div>

	<div class="col-xs-10 col-xs-offset-2" id="documentacao" style="z-index: -99; margin-top: 30px ;">
		<div class="col-xs-12 documentacao">
			<h3>Documentação</h3>
				<div class="col-md-6">
					<div class="col-xs-12 jumbotron" style="padding: 15px 15px 15px 15px;">
						<h5 class="text-justify">Para o funcionamento do Sistema de Análise de projeto arquitetônico, de acordo com as leis vigentes do município, será preciso criar, pelo profissional, algumas layers no desenho para referenciar parâmetros que identifique as informações necessárias do projeto. </h5>
							
							<strong>
								* O desenho que será analisado, deverá ser a 'Planta Baixa', e deverá estar na escala 1:50<br><br>
								* Os desenhos cujo as layers são ‘Loteamento_val’, ‘CadastroCP_val’, ‘Edificação_val’, 'Area Permeavel_val' e 'Vagas_val' deverão estar obrigatoriamente em Polyline.<br><br>
								* As cotas das layers ‘_val’, não poderá ser editado na tela de propriedades, aba Text, parâmetro Text override.
							</strong>
							
					</div>
					<hr  class="container-fluid">
					<div class="jumbotron" style="padding: 5px 5px 5px 15px;">
						<h5 class="text-center">
							<strong>
								<span >Baixe aqui o arquivo que criará automaticamente as layers:</span>
								<a class="btn btn-success" href="https://drive.google.com/uc?authuser=0&id=15yO6kJi-b9PB-b7kFnS0XC36EfGVkaAI&export=download">
									Download
								</a>
							</strong>
						</h5>
					</div>
					<!-- <hr  class="container-fluid"> -->
					
					<div class="jumbotron" style="padding: 5px 5px 5px 15px;">
						<h5>Passo a Passo de como criar as layers através do plugin baixado:</h5>
						<ol>
							<li>Digite no painel de comandos do AutoCad 'NETLOAD' + 'ENTER'</li>
							<li>Novamente no painel de comandos, Digite 'CRIARLAYERS' + 'ENTER'</li>
							<li>Escolha o arquivo baixado e Enter novamente</li>
						</ol>
					</div>
				</div>

				<div class="col-md-6 text-center imagem-layer " style="margin-bottom: 20px;">
					<img src="img/layers_novo.png" alt="" style="box-shadow: 0px 2px 14px #000;">	
					<h5 class="text-center">Segue as layers que são criadas automaticamente:</h5>

				</div>
		</div>

	<hr class="container-fluid" id="data-extration">

		<div class="data-extractor" >
			<h3>Usando o Data Extraction</h3>
				<div class="col-xs-12 text-center imagem-data">
					<img src="img/data.jpg" alt="data-extraction">
					<p>Page 1-8: Use o comando 'dataextraction' e depois 'Next', salve o arquivo em um local de fácil acesso no seu computador</p>
				</div>
				<div class="col-xs-12 text-center select-obj">
					<img src="img/select-obj.jpg" alt="selecao-de-objetos">
					<p>Page 2-8: Selecione 'Select Objects in the current drawing' e clique no ícone ao lado. Depois de selecionar o desenho clique em 'Next'</p>
				</div>
				<div class="col-xs-12 text-center select-obj">
					<img src="img/objetos.jpg" alt="selecao-de-objetos">
					<p>Page 3-8: Em 'Display options' demarque a opção 'Display all objects types' e selecione a segunda opção 'Display non-blocs only', e depois clique em 'Next'</p>
				</div>
				<div class="col-xs-12 text-center select-obj">
					<img src="img/propriedade.jpg" alt="selecao-de-objetos">
					<p>Page 4-8: Nesta tela na aba 'Category filter' deixe marcada apenas as opções 'General' - 'Geometry' - 'Misc', e depois clique em 'Next'</p>
				</div>
				<div class="col-xs-12 text-center select-obj">
					<img src="img/refine-data.jpg" alt="selecao-de-objetos">
					<p>Page 5-8: Nesta tela desmarque apenas a opção 'Combine identical rows' e depois clique em 'Next'</p>
				</div>
				<div class="col-xs-12 text-center select-obj">
					<img src="img/output.jpg" alt="selecao-de-objetos">
					<p>Page 6-8: Selecione a segunda opção e clique no ícone com '...',<br> escolha o local para salvar o arquivo e na opção 'Files of Type', escolha o tipo de arquivo '.csv', clique em 'Next' e depois 'Finish'</p>
				</div>

				<hr class="container-fluid">

		</div>

	</div>
	
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


