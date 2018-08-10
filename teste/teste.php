<?php
    
    require __DIR__.'\../conexao/conexao.php';
    
    $nome_relatorio = $_GET['nome_relatorio'];


	  // SELECT SOMENTE NA LAYER LOTEAMENTO REAL
    $resultado = $conexao->query("SELECT * FROM dadosReport WHERE nomeRelatorio = '".$nome_relatorio."' LIMIT 1");
    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {
            $nome_proj = $row['nomeRelatorio'];
            $iptu = $row['iptu'];
            $zoneamento = $row['zoneamento'];
            $uso = $row['uso'];
            $areaEdificacao = $row['areaEdificacao'];
            $areaLote = $row['areaLoteReal'];
            $areaCp = $row['areaLoteCp'];
        } 
    }

	$resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento lateral direita' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

        	$descricaoAfastamentoDireito = $row['descricao'];	
            $afastamentoLateralDireito = $row['medidaProjeto'];
            $afastamentoDireitoPermitido = $row['medidaPermitida'];
            $situacaoAfastDireito = $row['situacao'];
            $observacaoAfastDireito = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento lateral esquerda' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

        	$descricaoAfastamentoEsquerdo = $row['descricao'];	
            $afastamentoLateralEsquerdo = $row['medidaProjeto'];
            $afastamentoEsquerdoPermitido = $row['medidaPermitida'];
            $situacaoAfastEsquerda = $row['situacao'];
            $observacaoAfastEsquerdo = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento frontal' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

        	$descricaoAfastamentoFrontal = $row['descricao'];	
            $afastamentoFrontal = $row['medidaProjeto'];
            $afastamentoFrontalPermitido = $row['medidaPermitida'];
            $situacaoAfastFrontal = $row['situacao'];
            $observacaoAfastFrontal = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento fundos' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

        	$descricaoAfastamentoFundo = $row['descricao'];		
            $afastamentoFundos = $row['medidaProjeto'];
            $afastamentoFundosPermitido = $row['medidaPermitida'];
            $situacaoAfastFundos = $row['situacao'];
            $observacaoAfastFundos = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Taxa de Ocupação' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

          	$descricaoTaxa = $row['descricao'];
            $taxaOcupacao = $row['medidaProjeto'];
            $taxaOcupacaoPermitido = $row['medidaPermitida'];
            $situacaoTaxa = $row['situacao'];
            $observacaoTaxa = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Coeficiente Aproveitamento' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

        	$descricaoCaAproveitamento = $row['descricao'];	
            $caAproveitamento = $row['medidaProjeto'];
            $caAproveitamentoPermitido = $row['medidaPermitida'];
            $situacaoCA = $row['situacao'];
            $observacaoCA = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Altura na divisa' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

			$descricaoAlturaDivisa = $row['descricao'];	
            $alturaDivisa = $row['medidaProjeto'];
            $alturaDivisaPermitido = $row['medidaPermitida'];
            $situacaoAlturaDivisa = $row['situacao'];
            $observacaoAlturaDivisa = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Área Permeável' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

        	$descricaoAreaPermeavel = $row['descricao'];		
            $areaPermeavel = $row['medidaProjeto'];
            $areaPermeavelPermitido = $row['medidaPermitida'];
            $situacaoAreaPermeavel = $row['situacao'];
            $observacaoAreaPermeavel = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Vagas de Estacionamento' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

        	$descricaoVagas = $row['descricao'];	
            $vagasEstacionamento = $row['medidaProjeto'];
            $vagasPermitido = $row['medidaPermitida'];
            $situacaoVagas = $row['situacao'];
            $observacaoVagas = $row['observacao'];

        } 
    }

    require_once("tela.php");

    // echo $afastamento . '<br>';
    // echo $afastamentoPermitido

  ?>
