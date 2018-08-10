<?php session_start() ?>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<link href="../fontawesome/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/estilo.css">


<img src="../img/projeto.jpg" class="img" style="position:fixed; z-index: -99; background-attachment: fixed;  opacity: 0.3; border: 1px solid #aaa;" alt="Projeto Arquitetônico">
<div class="row-fluid">
    <div  class="col-md-2 col-xs-12 bg-menu" style="z-index: 10">
        <div class="menu collapse navbar-collapse"  id="navbar-1">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item active"><a href="../index.php" class="nav-link">Ínicio</a></li>
                <li class="nav-item"><a href="#" id="hover" class="nav-link">Regras <span class="caret"></span></a>
                    <ul class="dropdown">
                        <li><a href="../Documentacao.php" >Documentacao</a></li>
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

    <div class="col-md-10 col-md-offset-2" style="position:fixed; z-index: 9">
        <header class="row header">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
                        <span class="sr-only">Menu</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                    </button>
                        <a href="../index.php" class="navbar-brand">Análise de Projetos Arquitetônicos</a>
                </div>
                <div class="sair text-center" style="margin-top: 5px;">
                    <a href="?sair">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true" title="Sair"></span>
                        <texto><?php echo $_SESSION['nome_usuario'] ?></texto><br>
                        <span>CAU: 1066AB39</span>
                    </a>
                </div>
        </header>        
    </div>
<div class="container">
    <div class="col-md-10 col-md-offset-2 header-relatorio" style="margin-top: 50px; background-color: transparent; color: #fff"">
        <div style="margin-top: 15px;padding: 5px 0px; background-color: #397ab7; color: #fff">
            <h3 class="text-center" >Relatório</h3>
        </div>    
            <a href="../impressao1.php?nome_relatorio=<?php echo $nome_proj ?>" target="_blank" class="btn btn-default" id="printer" style="float: right; margin-top: -40px; margin-right: 120px; width: 110px; border: 0.5px solid #ccc;"><i class="fas fa-print" style="width: 12px;"></i> 
            Salvar PDF
            </a>
            <a href="../index.php" class="btn btn-default" id="printer" style="float: right; margin-top: -40px; margin-right: 5px; width: 100px; border: 0.5px solid #ccc;"><i class="fas fa-arrow-left" style="width: 12px;"></i> 
            Voltar
            </a>
        <div style="clear: both; "></div>
    </div>
    
<div class="col-md-10 col-md-offset-2">
    <table class="table-bordered table-condensed table" style="background-color: #fff; box-shadow: 0px 3px 14px #000">
        <tbody>
            <tr>
                <td>
                <table class=" table table-bordered table-condensed" style="margin-top: 8px; z-index: -9999">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #d2d2d2; color: #444; ">DADOS DO LOTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                            <tr >
                                                <th>Nome Projeto</th>
                                                <td colspan="4" style="text-transform: uppercase"><?php echo $nome_proj ?></td>
                                                <th >Indice Cadastral</th>
                                                <td class=""><?php echo $iptu ?></td>
                                                <th class="">Zoneamento</th>
                                                <td class="" style="text-transform: uppercase"><?php echo $zoneamento ?></td>
                                                    

                                           </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="" >Área da Edificação</th>
                                                <td class=""><?php echo $areaEdificacao ?> m²</td>
                                                    
                                                <th colspan="2">Tipo de uso</th>
                                                <td class="" style="text-transform: uppercase"><?php echo $uso ?></td>
                                                    
                                                <th class="" >Área do lote (REAL)</th>                                
                                                <td class=""><?php echo $areaLote ?> m²</td>     
                                                
                                                <th class="" >Área do lote (CP)</th>
                                                <td class=""><?php echo $areaCp ?> m²</t>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th colspan="8" class="text-center"  style="background-color: #d2d2d2; color: #444;">ESPECIFICIDADES DO PROJETO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td>
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="5" style="background-color: #f0f0f0;" class="text-center">ITENS VERIFICADOS</th>  
                                                                           
                                            </tr>
                                            <tr>
                                                <th class="text-center">Descrição</th>
                                                <th colspan="" class="text-center">Medida do projeto</th>  
                                                <th colspan="" class="text-center">
                                                    Permitido conforme:<br>
                                                   <i style="font-size: 10px; font-weight: initial">(lei nº 079/2009)</i>
                                                </th>                          
                                                <th colspan="" class="text-center">Status</th>                          
                                                <th colspan="" style="width: 50%" class="text-center">Observação</th>                          
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <tr >
                                                <td class="text-center">Afastamento lateral direita</td>
                                                <td class="text-center"><?php echo $afastamentoLateralDireito ?> m</td>
                                                <td class="text-center"><?php echo $afastamentoDireitoPermitido ?> m</td>
                                                <td class="text-center"><?php echo $situacaoAfastDireito ?></td>
                                                <td class="text-center"><?php echo $observacaoAfastDireito ?></i></td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Afastamento lateral esquerda</td>
                                                <td class="text-center"><?php echo $afastamentoLateralEsquerdo?> m</td>
                                                <td class="text-center"><?php echo $afastamentoEsquerdoPermitido ?> m</td>
                                                <td class="text-center"><?php echo $situacaoAfastEsquerda ?></td>
                                                <td class="text-center"><?php echo $observacaoAfastEsquerdo ?></td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Afastamento frontal</td>
                                                <td class="text-center"><?php echo $afastamentoFrontal ?> m</td>
                                                <td class="text-center"><?php echo $afastamentoFrontalPermitido ?> m</td>
                                                <td class="text-center"><?php echo $situacaoAfastFrontal ?></td>
                                                <td class="text-center"><?php echo $observacaoAfastFrontal ?></td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Afastamento fundos</td>
                                                <td class="text-center"><?php echo $afastamentoFundos ?> m</td>
                                                <td class="text-center"><?php echo $afastamentoFundosPermitido ?> m</td>
                                                <td class="text-center"><?php echo $situacaoAfastFundos ?></td>
                                                <td class="text-center"><?php echo $observacaoAfastFundos ?><</td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Taxa de Ocupação</td>
                                                <td class="text-center"><?php echo $taxaOcupacao ?> m²</td>
                                                <td class="text-center"><?php echo $taxaOcupacaoPermitido ?> m²</td>
                                                <td class="text-center"><?php echo $situacaoTaxa ?></td>
                                                <td class="text-center"><?php echo $observacaoTaxa ?></td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Coeficiente Aproveitamento</td>
                                                <td class="text-center"><?php echo $caAproveitamento ?> m²</td>
                                                <td class="text-center"><?php echo $caAproveitamentoPermitido ?> m²</td>
                                                <td class="text-center"><?php echo $situacaoCA ?></td>
                                                <td class="text-center"><?php echo $observacaoCA ?></td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Altura na divisa</td>
                                                <td class="text-center"><?php echo $alturaDivisa?> m</td>
                                                <td class="text-center"><?php echo $alturaDivisaPermitido ?> m</td>
                                                <td class="text-center"><?php echo $situacaoAlturaDivisa ?></td>
                                                <td class="text-center"><?php echo $observacaoAlturaDivisa ?></td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Área Permeável</td>
                                                <td class="text-center"><?php echo $areaPermeavel ?> m²</td>
                                                <td class="text-center"><?php echo $areaPermeavelPermitido ?> m²</td>
                                                <td class="text-center"><?php echo $situacaoAreaPermeavel ?></td>
                                                <td class="text-center"><?php echo $observacaoAreaPermeavel ?></td>
                                            </tr>
                                            <tr >
                                                <td class="text-center">Vagas de Estacionamento</td>
                                                <td class="text-center"><?php echo $vagasEstacionamento ?> vagas</td>
                                                <td class="text-center"><?php echo $vagasPermitido = 1 ?> vagas</td>
                                                <td class="text-center"><?php echo $situacaoVagas ?></td>
                                                <td class="text-center"><?php echo $observacaoVagas ?></td>
                                            </tr>                                           
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    
                    </table>
                </td>
            </tr>
        </tbody>
        </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<script type="text/javascript" src="../ js/efeitos.js"></script>